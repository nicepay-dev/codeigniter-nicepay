<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, VirtualAccount, InquiryStatus};
use App\Libraries\{Snap, SnapVAService, SnapQrisService, V2VAService};

use Tests\unit\NicepayTestConst;


final class NicepayInquiryStatusTest extends CIUnitTestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;
    private $merchantKey;
    private $v2Config;

    // public function setUp(): void {}

    protected function setUp(): void
    {
        $testConst = new NicepayTestConst();
        $this->clientSecret = $testConst::IMID_TEST_CLIENT_SECRET;
        $this->oldKeyFormat = $testConst::IMID_TEST_PRIVATE_KEY;
        $this->iMidTest = $testConst::IMID_TEST;
        $this->merchantKey = $testConst::IMID_COMMON_MERCHANT_KEY;

        $this->v2Config = NICEPay::builder()
            ->setIsProduction(false)
            ->build();
    }

    public function testInquiryStatusVASnap()
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

        $inquiryStatusBuilder = InquiryStatus::builder();
        $parameter = $inquiryStatusBuilder
            ->setPartnerServiceId(partnerServiceId: "")
            ->setCustomerNo("")
            ->setVirtualAccountNo("70014000091454110516")
            ->setInquiryRequestId("reqIdVA" . $timestamp)
            ->setTrxId("2022020100000000000001")
            ->setTxIdVA("IONPAYTEST02202502241454110516")
            ->setTotalAmount("10000.00", "IDR")
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapVAService = new SnapVAService();

        try {
            $response = $snapVAService->inquiryStatus($parameter, $accessToken, $config);
            $this->assertEquals("2002600", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

    }

    public function testInquiryStatusVAV2()
    {

        $timeStamp = Helper::getFormattedTimestampV2();
        $reffNo = "ordNo20250508141125";
        $amount = "10000";

        $config = $this->v2Config;

        $parameter = InquiryStatus::builder()
            ->setTimeStamp($timeStamp)
            ->setTxId("IONPAYTEST02202505081411250494")
            ->setIMid($this->iMidTest)
            ->setMerchantToken($timeStamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setReferenceNo($reffNo)
            ->setAmt($amount)
            ->build();

        try {

            $v2VaService = new V2VAService($config);
            $response = $v2VaService->inquiryStatus($parameter);

            $this->assertEquals("0000", $response->getResultCd());
        } catch (Exception $e) {

            $this->fail("Test Inquiry Status VA V2 Failed" . $e->getMessage());
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
