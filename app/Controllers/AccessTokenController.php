<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;

use App\Models\AccessToken;
use App\Models\NICEPay;
use App\Libraries\Snap;
use Exception;
use App\Helpers\Helper;

class AccessTokenController extends BaseController
{

    // public function getAccessToken()
    // {

    //     $timestamp = Helper::getFormattedDate();
    //     $private_key = "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAInJe1G22R2fMchIE6BjtYRqyMj6lurP/zq6vy79WaiGKt0Fxs4q3Ab4ifmOXd97ynS5f0JRfIqakXDcV/e2rx9bFdsS2HORY7o5At7D5E3tkyNM9smI/7dk8d3O0fyeZyrmPMySghzgkR3oMEDW1TCD5q63Hh/oq0LKZ/4Jjcb9AgMBAAECgYA4Boz2NPsjaE+9uFECrohoR2NNFVe4Msr8/mIuoSWLuMJFDMxBmHvO+dBggNr6vEMeIy7zsF6LnT32PiImv0mFRY5fRD5iLAAlIdh8ux9NXDIHgyera/PW4nyMaz2uC67MRm7uhCTKfDAJK7LXqrNVDlIBFdweH5uzmrPBn77foQJBAMPCnCzR9vIfqbk7gQaA0hVnXL3qBQPMmHaeIk0BMAfXTVq37PUfryo+80XXgEP1mN/e7f10GDUPFiVw6Wfwz38CQQC0L+xoxraftGnwFcVN1cK/MwqGS+DYNXnddo7Hu3+RShUjCz5E5NzVWH5yHu0E0Zt3sdYD2t7u7HSr9wn96OeDAkEApzB6eb0JD1kDd3PeilNTGXyhtIE9rzT5sbT0zpeJEelL44LaGa/pxkblNm0K2v/ShMC8uY6Bbi9oVqnMbj04uQJAJDIgTmfkla5bPZRR/zG6nkf1jEa/0w7i/R7szaiXlqsIFfMTPimvRtgxBmG6ASbOETxTHpEgCWTMhyLoCe54WwJATmPDSXk4APUQNvX5rr5OSfGWEOo67cKBvp5Wst+tpvc6AbIJeiRFlKF4fXYTb6HtiuulgwQNePuvlzlt2Q8hqQ==";

    //     $config = NICEPay::builder()
    //         ->setIsProduction(false)
    //         ->setPrivateKey($private_key)
    //         ->setClientSecret("1af9014925cab04606b2e77a7536cb0d5c51353924a966e503953e010234108a")
    //         ->setPartnerId("NORMALTEST")
    //         ->setExternalID("extId" . $timestamp)
    //         ->setTimestamp($timestamp)
    //         ->build();

    //     $data = AccessToken::builder()
    //         ->setGrantType("client_credentials")
    //         ->setAdditionalInfo([])
    //         ->build();

    //     $snap = new Snap($config);

    //     try {
    //         $response = $snap->requestSnapAccessToken($data);
    //     } catch (\Throwable $th) {
    //         // throw $th;
    //         print_r($th);

    //         throw new Exception($th->getMessage());
    //     }

    //     return $this->response->setJSON($response->toArray());
    // }

    // private function generateSHA256withRSASignature($data, $private_key)
    // {
    //   $privateKey = openssl_pkey_get_private($private_key);

    //   openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);

    //   openssl_free_key($privateKey);

    //   return base64_encode($signature);
    // }
}
