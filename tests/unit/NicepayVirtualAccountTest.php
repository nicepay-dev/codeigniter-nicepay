<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, VirtualAccount};
use App\Libraries\{Snap, SnapVAService};

use Tests\unit\NicepayTestConst;

final class NicepayVirtualAccountTest extends CIUnitTestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;

    // public function setUp(): void {}

    protected function setUp(): void
    {
        $const = new NicepayTestConst();
        $this->clientSecret = $const::IMID_TEST_CLIENT_SECRET;
        $this->oldKeyFormat = $const::IMID_TEST_PRIVATE_KEY;
        $this->iMidTest = $const::IMID_TEST;
    }

    public function testGenerateVASnap()
    {
        $timestamp = Helper::getFormattedDate();

        $config = NICEPay::builder()
            // ->setIsProduction(false)
            ->setIsCloudServer(isCloudServer: true)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDVa" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $virtualAccountBuilder = VirtualAccount::builder();
        $parameter = $virtualAccountBuilder
            ->setPartnerServiceId("")
            ->setCustomerNo("")
            ->setVirtualAccountNo("")
            ->setVirtualAccountName("Nicepay PHP Test")
            ->setTrxId("2022020100000000000001")
            ->setTotalAmount('10000.00', 'IDR')
            ->setAdditionalInfo([
                'bankCd' => 'BMRI',
                'goodsNm' => 'Jhon Doe',
                'dbProcessUrl' => 'https://dev.nicepay.co.id/IONPAY_CLIENT/paymentResult.jsp',
            ])
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapVAService = new SnapVAService();

        try {
            $response = $snapVAService->generateVA($parameter, $accessToken, $config);
            $this->assertEquals("2002700", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

        $virtualAccountDataArray = $response->getVirtualAccountData();
        $totalAmountArray = $response->getVirtualAccountData()['totalAmount'];
        $additionalInfoArray = $response->getVirtualAccountData()['additionalInfo'];
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
