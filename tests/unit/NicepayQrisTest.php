<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, Qris};
use App\Libraries\{Snap, SnapQrisService, V2QrisService};

use Tests\unit\NicepayTestConst;


final class NicepayQrisTest extends CIUnitTestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;
    private $storeId;
    private $merchantKey;

    protected function setUp(): void
    {
        $testConst = new NicepayTestConst();
        $this->clientSecret = $testConst::IMID_TEST_CLIENT_SECRET;
        $this->oldKeyFormat = $testConst::IMID_TEST_PRIVATE_KEY;
        $this->iMidTest = $testConst::IMID_TEST;
        $this->storeId = $testConst::IMID_QRIS_STORE_ID;
        $this->merchantKey = $testConst::IMID_COMMON_MERCHANT_KEY;
    }

    public function testGenerateQrisSnap()
    {
        $timestamp = Helper::getFormattedDate();

        // Set the validity period to 15 minutes from now
        $validityPeriod = (new DateTime())->add(new DateInterval('PT15M'))->format('Y-m-d\TH:i:s');

        $config = NICEPay::builder()
            // ->setIsProduction(false)
            ->setIsCloudServer(isCloudServer: true)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDVa" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $qrisBuilder = Qris::builder();
        $requestBody = $qrisBuilder
            ->setPartnerReferenceNo("ordNo" . $timestamp)
            ->setAmount("10000.00", "IDR")
            ->setMerchantId($this->iMidTest)
            ->setStoreId($this->storeId)
            ->setValidityPeriod($validityPeriod)
            ->setAdditionalInfo(
                "Test SNAP Transaction Nicepay",
                "John Doe",
                "082213561712",
                "email@merchant.com",
                "Jakarta",
                "Jalan Bukit Berbunga 22",
                "DKI Jakarta",
                "12345",
                "Indonesia",
                "https://ptsv2.com/t/jhon/post",
                "https://ptsv2.com/t/jhon/post",
                "127.0.0.1",
                "{\"count\":1,\"item\":[{\"img_url\":\"https://d3nevzfk7ii3be.cloudfront.net/igi/vOrGHXlovukA566A.medium\",\"goods_name\":\"Nokia 3360\",\"goods_detail\":\"Old Nokia 3360\",\"goods_amt\":\"100\",\"goods_quantity\":\"1\"}]}",
                "QSHP"
            )
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapQrisService = new SnapQrisService();

        try {
            $response = $snapQrisService->generateQris($requestBody, $accessToken, $config);
            $this->assertEquals("2004700", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Generate Qris Test Failed " . $e->getMessage());
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

    public function testRegistrationQrisV2()
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
        $QrisBuilder = Qris::builder();
        $parameter = $QrisBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("08")
            ->setCurrency("IDR")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setgoodsNm("Test Transaction Qris with Codeigniter PHP")
            ->setBillingNm("John Doe")
            ->setBillingPhone("081214714045")
            ->setBillingEmail("email@merchant.com")
            ->setBillingCity("Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("12345")
            ->setBillingCountry("Indonesia")
            ->setDbProcessUrl("https://webhook.site/ef70a4f6-d874-4501-b580-8e9b3010fa82")
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setUserIP("127.0.0.1")
            ->setMitraCd("QSHP")
            ->setCartData(json_encode($cartData))
            ->setPaymentExpDt("")
            ->setPaymentExpTm("")
            ->setShopId("NICEPAY")
            ->build();

        $qrisService = new V2QrisService($config);

        try {
            $response = $qrisService->registration($parameter);
            $this->assertEquals("0000", $response->getResultCd());
            if($response->getResultMsg() == "Success"){
                $this->assertEquals("Success", $response->getResultMsg());
            } else {
                $this->assertEquals("SUCCESS", $response->getResultMsg());
            }
            // Add more assertions as needed for specific response properties
        } catch (Exception $e) {
            $this->fail("Failed Test Registration Qrs V2, exception thrown: " . $e->getMessage());
        }
    }
}
