<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, RefundEwallet};
use App\Libraries\{Snap, SnapEwalletService};

use Tests\unit\NicepayTestConst;

final class NicepayRefundEwalletTest extends CIUnitTestCase
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

    public function testRefundEwalletSnap()
    {
        $timestamp = Helper::getFormattedDate();

        $config = NICEPay::builder()
            // ->setIsProduction(false)
            ->setIsCloudServer(isCloudServer: true)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDEwallet" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $refundEwalletBuilder = RefundEwallet::builder();
        $requestBody = $refundEwalletBuilder
            ->setMerchantId($this->iMidTest)
            ->setSubMerchantId("")
            ->setOriginalPartnerReferenceNo("ordNo2025-02-27T15:01:05+07:00")
            ->setOriginalReferenceNO("IONPAYTEST05202502271501076450")
            ->setPartnerRefundNo("ordNo2025-02-27T15:01:05+07:00")
            ->setRefundAmount("1000.00", "IDR")
            ->setExternalStoreId("")
            ->setReason("Test Refund Ewallet")
            ->setAdditionalInfo("1")
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapEwalletService = new SnapEwalletService();

        try {
            $response = $snapEwalletService->refundEwallet($requestBody, $accessToken, $config);
            $this->assertEquals("2005800", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Refund Snap Ewallet failed, exception thrown : " . $e->getMessage());
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
