<?php

namespace App\Libraries;

use App\Models\{Ewallet, NicepayV2Response};

class V2EwalletService extends BaseV2Service
{
    /**
     * Do payment with Ewallet payment method
     * @param Ewallet $requestBody Request body of Ewallet
     * @return string
     */

    public function payment(Ewallet $requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'direct/v2/payment', "POST");
    }
}