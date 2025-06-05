<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, AccessToken, VirtualAccount};
use App\Libraries\{Snap, SnapVAService, V2VAService};

use Tests\unit\NicepayTestConst;

final class NicepayVirtualAccountTest extends CIUnitTestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;
    private $merchantKey;

    // public function setUp(): void {}

    protected function setUp(): void
    {
        $const = new NicepayTestConst();
        $this->clientSecret = $const::IMID_TEST_CLIENT_SECRET;
        $this->oldKeyFormat = $const::IMID_TEST_PRIVATE_KEY;
        $this->iMidTest = $const::IMID_TEST;
        $this->merchantKey = $const::IMID_COMMON_MERCHANT_KEY;
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

        $json = json_encode($response->toArray());

        $virtualAccountDataArray = $response->getVirtualAccountData();
        $totalAmountArray = $response->getVirtualAccountData()['totalAmount'];
        $additionalInfoArray = $response->getVirtualAccountData()['additionalInfo'];
    }

    public function testGenerateVAV2()
    {
        $timestamp = Helper::getFormattedTimestampV2();
        $configBuilder = NICEPay::builder();
        $config = $configBuilder
            // ->setIsProduction(false)
            ->setIsCloudServer(isCloudServer: true)
            ->build();
        $reffNo = "ordNo" . $timestamp;
        $amount = "10000";
        $virtualAccountBuilder = VirtualAccount::builder();
        $parameter = $virtualAccountBuilder
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMidTest)
            ->setPayMethod("02")
            ->setCurrency("IDR")
            ->setDescription("Transaction Description")
            ->setBankCd("CENA")
            ->setAmt($amount)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setVacctValidDt("20251004")
            ->setVacctValidTm("101010")
            ->setMerFixAcctId("")
            ->setDbProcessUrl("https://webhook.site/7c2d47f6-557b-4b85-b91a-ad3b6182b10c")
            ->setGoodsNm("Test VA V2 PHP")
            ->setCartData("{}")
            ->setBillingNm("Nicepay PHP Codeigniter")
            ->setBillingPhone("081234567890")
            ->setBillingEmail("nicepay@example.com")
            ->setBillingAddr("Jln. Raya Kasablanka Kav.88")
            ->setBillingCity("South Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("15119")
            ->setBillingCountry("Indonesia")
            ->build();

        $v2VaService = new V2VAService($config);

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
