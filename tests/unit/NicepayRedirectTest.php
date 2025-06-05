<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, Redirect};
use App\Libraries\{V2RedirectService};

use Tests\unit\NicepayTestConst;

final class NicepayRedirectTest extends CIUnitTestCase
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

    public function testGenerateRedirectV2()
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
        $RedirectBuilder = Redirect::builder();
        $parameter = $RedirectBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("00")
            ->setCurrency("IDR")
            ->setDescription("Transaction Description")
            ->setBankCd("")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setVacctValidDt("")
            ->setVacctValidTm("")
            ->setMerFixAcctId("")
            ->setDbProcessUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setCallBackUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setGoodsNm("Test V2 Redirect PHP")
            ->setCartData(json_encode($cartData))
            ->setBillingNm("Nicepay PHP Codeigniter")
            ->setBillingPhone("081234567890")
            ->setBillingEmail("nicepay@example.com")
            ->setBillingAddr("Jln. Raya Kasablanka Kav.88")
            ->setBillingCity("South Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("15119")
            ->setBillingCountry("Indonesia")
            ->setUserIP("127.0.0.1")
            ->build();

        $v2VaService = new V2RedirectService($config);

        try {
            $response = $v2VaService->registration($parameter);
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
