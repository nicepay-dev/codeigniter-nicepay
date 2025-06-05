<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, Card};
use App\Libraries\{V2CardService};

use Tests\unit\NicepayTestConst;

final class NicepayCardTest extends CIUnitTestCase
{

    private $iMidTest;
    private $merchantKey;

    // public function setUp(): void {}

    protected function setUp(): void
    {
        $const = new NicepayTestConst();
        $this->iMidTest = $const::IMID_TEST;
        $this->merchantKey = $const::IMID_COMMON_MERCHANT_KEY;
    }

    public function testRegisterCardTransaction()
    {
        $timestamp = Helper::getFormattedTimestampV2();
        $configBuilder = NICEPay::builder();
        $config = $configBuilder
            ->setIsProduction(false)
            // ->setIsCloudServer(isCloudServer: true)
            ->build();
        $reffNo = "ordNo" . $timestamp;
        $amount = "10000";
        $CardBuilder = Card::builder();
        $parameter = $CardBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("01")
            ->setCurrency("IDR")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setDescription("Transaction Description")
            ->setgoodsNm("Test Transaction CC with Codeigniter PHP")
            ->setBillingNm("John Doe")
            ->setBillingPhone("081214714045")
            ->setBillingEmail("email@merchant.com")
            ->setBillingAddr("Jalan Bukit Berbunga 22")
            ->setBillingCity("Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("12345")
            ->setBillingCountry("Indonesia")
            ->setDbProcessUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setCartData("{}")
            ->setUserIP("127.0.0.1")
            ->setInstmntType("1")
            ->setInstmntMon("1")
            ->setRecurrOpt("1")
            ->setUserLanguage("en")
            ->setUserAgent("Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0")
            ->build();

        $cardService = new V2CardService($config);

        try {
            $response = $cardService->registration($parameter);
            $this->assertEquals("0000", $response->getResultCd());
            if($response->getResultMsg() == "Success"){
                $this->assertEquals("Success", $response->getResultMsg());
            } else {
                $this->assertEquals("SUCCESS", $response->getResultMsg());
            }
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Failed Registration Card Transaction, EX : " . $e->getMessage());
        }
    }

    public function testPaymentCardV2(){
        $timestamp = Helper::getFormattedTimestampV2();
        $configBuilder = NICEPay::builder();
        $config = $configBuilder
            ->setIsProduction(false)
            // ->setIsCloudServer(isCloudServer: true)
            ->build();
        
            $CardBuilder = Card::builder();
            $newCCTrx = $this->registNewCCTrx();
            $parameter = $CardBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setTXid($newCCTrx->getTXid())
            ->setReferenceNo($newCCTrx->getReferenceNo())
            ->setMerchantToken($timestamp, $this->iMidTest, $newCCTrx->getReferenceNo(), $newCCTrx->getAmt(), $this->merchantKey)
            ->setCardNo("5123456789101234")
            ->setCardExpYymm("3001")
            ->setCardCvv("123")
            ->setCardHolderNm("Jhon Doe")
            ->setCallBackUrl("https://dev.nicepay.co.id/IONPAY_CLIENT/paymentResult.jsp")
            ->build();

        try {
            $cardService = new V2CardService($config);
            $response = $cardService->payment($parameter);
            $this->assertIsString($response, "Response is not string");
            $this->assertNotNull($response, "Response is null");
            $this->assertNotEmpty($response, "Response is empty");
        } catch (Exception $e) {
            $this->fail("Failed Registration Card Transaction, EX : " . $e->getMessage());
        }
    }

    public function registNewCCTrx(){
        $timestamp = Helper::getFormattedTimestampV2();
        $configBuilder = NICEPay::builder();
        $config = $configBuilder
            ->setIsProduction(false)
            // ->setIsCloudServer(isCloudServer: true)
            ->build();

        $reffNo = "ordNo" . $timestamp;
        $amount = "10000";
        $CardBuilder = Card::builder();
        $parameter = $CardBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("01")
            ->setCurrency("IDR")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setDescription("Transaction Description")
            ->setgoodsNm("Test Transaction CC with Codeigniter PHP")
            ->setBillingNm("John Doe")
            ->setBillingPhone("081214714045")
            ->setBillingEmail("email@merchant.com")
            ->setBillingAddr("Jalan Bukit Berbunga 22")
            ->setBillingCity("Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("12345")
            ->setBillingCountry("Indonesia")
            ->setDbProcessUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setCartData("{}")
            ->setUserIP("127.0.0.1")
            ->setInstmntType("1")
            ->setInstmntMon("1")
            ->setRecurrOpt("1")
            ->setUserLanguage("en")
            ->setUserAgent("Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0")
            ->build();
    
        $cardService = new V2CardService($config);

        try {
            return $cardService->registration($parameter);
        } catch (Exception $e) {
            $this->fail("Failed Registration Card Transaction, EX : " . $e->getMessage());
        }
    }
}
