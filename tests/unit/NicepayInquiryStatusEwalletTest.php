<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, InquiryStatusEwallet};
use App\Libraries\{Snap, SnapEwalletService};

use Tests\unit\NicepayTestConst;

final class NicepayInquiryStatusEwalletTest extends CIUnitTestCase
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

    public function testInquiryStatusEwalletSnap()
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

        $inquiryStatusEwalletBuilder = InquiryStatusEwallet::builder();
        $requestBody = $inquiryStatusEwalletBuilder
            ->setMerchantId($this->iMidTest)
            ->setSubMerchantId("310928924949487")
            ->setOriginalPartnerReferenceNo("ordNo2025-02-27T15:01:05+07:00")
            ->setOriginalReferenceNO("IONPAYTEST05202502271501076450")
            ->setServiceCode("54")
            ->setTransactionDate($timestamp)
            ->setExternalStoreId("")
            ->setAmount("1000.00", "IDR")
            ->setAdditionalInfo([])
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapEwalletService = new SnapEwalletService();

        try {
            $response = $snapEwalletService->inquiryStatusEwallet($requestBody, $accessToken, $config);
            $this->assertEquals("2005500", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Inquiry Status Snap Ewallet failed. error thrown : " . $e->getMessage());
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
