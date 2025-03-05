<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, Payout};
use App\Libraries\{Snap, SnapPayoutService};

use Tests\unit\NicepayTestConst;

final class NicepayRejectPayoutTest extends CIUnitTestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;

    protected function setUp(): void
    {
        $testConst = new NicepayTestConst();
        $this->clientSecret = $testConst::IMID_TEST_CLIENT_SECRET;
        $this->oldKeyFormat = $testConst::IMID_TEST_PRIVATE_KEY;
        $this->iMidTest = $testConst::IMID_TEST;
    }

    public function testRejectPayoutSnap()
    {
        $timestamp = Helper::getFormattedDate();

        $config = NICEPay::builder()
            // ->setIsProduction(false)
            ->setIsCloudServer(isCloudServer: true)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDPayout" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $payoutBuilder = Payout::builder();
        $requestBody = Payout::builder()
            ->setMerchantId("IONPAYTEST")
            ->setOriginalReferenceNo("IONPAYTEST07202412101423123240")
            ->setOriginalPartnerReferenceNo("ordRefPayout20241210142312")
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapPayoutService = new SnapPayoutService();

        try {
            $response = $snapPayoutService->rejectPayout($requestBody, $accessToken, $config);
            $this->assertEquals("2000000", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Failed test reject failed , exception thrown : " . $e->getMessage());
        }
    }

    private function getAccessToken(NICEPay $config): string
    {

        $tokenBody = AccessToken::builder()
            ->setGrantType('client_credentials')
            ->setAdditionalInfo([])
            ->build();

        $snap = new Snap($config);

        try {
            $response = $snap->requestSnapAccessToken($tokenBody);
        } catch (Exception $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

        return $response->getAccessToken();

    }
}
