<?php

namespace App\Libraries;

use App\Models\{NICEPay, NicepayV2Response, Payout};

class V2PayoutService
{
    protected NicepayV2 $v2Service;

    public function __construct(NICEPay $config)
    {
        $this->v2Service = new NicepayV2($config);
    }

    /**
     * Registration API for V2
     *
     * @param mixed $requestBody The request body for registration
     * @return NicepayV2Response The response from the registration API
     */

     public function registration($requestBody): NicepayV2Response
     {
         return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/requestPayout', "POST");
     }

     public function approveTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/approvePayout', "POST");
    }


    public function inquiryTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/inquiryPayout', "POST");
    }

    public function cancelTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/cancelPayout', "POST");
    }

    public function rejectTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/rejectPayout', "POST");
    }

    public function balanceInquiry($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'api/direct/v2/balanceInquiry', "POST");
    }
}