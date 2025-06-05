<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, Cvs};
use App\Libraries\{V2CvsService};

use Tests\unit\NicepayTestConst;

final class NicepayCvSTest extends CIUnitTestCase
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

    public function testRegistrationCvSV2()
    {
        $timestamp = Helper::getFormattedTimestampV2();
        $configBuilder = NICEPay::builder();
        $config = $configBuilder
            ->setIsProduction(false)
            // ->setIsCloudServer(isCloudServer: true)
            ->build();
        $reffNo = "ordNo" . $timestamp;
        $amount = "10000";
        $cartData = [
            "count" => "1",
            "item" => [[
                "goods_id" => "BB12345678",
                "goods_detail" => "BB123456",
                "goods_name" => "iPhone5S",
                "goods_amt" => $amount,  // Replace dynamically if needed
                "goods_type" => "Smartphone",
                "goods_url" => "http://merchant.com/cellphones/iphone5s_64g",
                "goods_quantity" => "1",
                "goods_sellers_id" => "SEL123",
                "goods_sellers_name" => "Sellers1"
            ]]
        ];
        $CvsBuilder = Cvs::builder();
        $parameter = $CvsBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("03")
            ->setCurrency("IDR")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setgoodsNm("Test Transaction Cvs with Codeigniter PHP")
            ->setBillingNm("John Doe")
            ->setBillingPhone("081214714045")
            ->setBillingEmail("email@merchant.com")
            ->setBillingAddr("Jalan Bukit Berbunga 22")
            ->setBillingCity("Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("12345")
            ->setBillingCountry("Indonesia")
            ->setDbProcessUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setDescription("Transaction Description")
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setUserIP("127.0.0.1")
            ->setMitraCd("ALMA")
            ->setCartData(json_encode($cartData))
            ->setPayValidDt("")
            ->setPayValidTm("")
            ->build();

        $cvsService = new V2CvsService($config);

        try {
            $response = $cvsService->registration($parameter);
            $this->assertEquals("0000", $response->getResultCd());
            if($response->getResultMsg() == "Success"){
                $this->assertEquals("Success", $response->getResultMsg());
            } else {
                $this->assertEquals("SUCCESS", $response->getResultMsg());
            }
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }
    }
}
