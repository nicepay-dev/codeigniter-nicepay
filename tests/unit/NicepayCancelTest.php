<?php

use App\Helpers\Helper;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\{NICEPay, Cancel};
use App\Libraries\{Snap, V2VAService};

use Tests\unit\NicepayTestConst;

final class NicepayCancelTest extends CIUnitTestCase
{

    private $configV2;
    private $configEwallet;
    private $timestamp;
    private $timestampv2;
    private $iMid;
    private $amount;
    private $merchantKey;

    protected function setUp(): void
    {
        $const = new NicepayTestConst();
        $this->timestampv2 = Helper::getFormattedTimestampV2();
        $this->amount = "10000";
        $this->iMid = $const::IMID_NORMALTEST;
        $this->merchantKey = $const::IMID_COMMON_MERCHANT_KEY;

        $this->configV2 = Nicepay::builder()
            // ->setIsProduction(isProduction: false)
            ->setIsCloudServer(isCloudServer: true)
            ->build();
    }

    public function testCancelV2VA()
    {

        $config = $this->configV2;
        $timestamp = Helper::getFormattedTimestampV2();
        $txId = "NORMALTEST02202505081601578166";
        $amount = "10000";
        $reffNo = "ord20250508160572";

        $requestBody = Cancel::builder()
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMid)
            ->setTXid($txId)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMid, $txId, $amount, $this->merchantKey)
            ->setPayMethod("02")
            ->setCancelType("1")
            ->setAmt($this->amount)
            ->build();

        try {

            $v2VaService = new V2VAService($config);
            $response = $v2VaService->cancel($requestBody);

            $this->assertEquals("0000", $response->getResultCd());
            if($response->getResultMsg() == "Success"){
                $this->assertEquals("Success", $response->getResultMsg());
            } else {
                $this->assertEquals("SUCCESS", $response->getResultMsg());
            }
        } catch (Exception $e) {
            $this->fail("Test cancel V2 failed! exception thrown : " . $e->getMessage());
        }
    }
}
