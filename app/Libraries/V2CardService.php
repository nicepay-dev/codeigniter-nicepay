<?php

namespace App\Libraries;

use App\Models\{Card};

class V2CardService extends BaseV2Service
{
    /**
     * Do payment with Card payment method
     * @param Card $requestBody Request body of Card
     * @return string
     */

    public function payment(Card $requestBody)
    {
        return $this->v2Service->requestV2TransactionUrlencodedBody($requestBody, 'direct/v2/payment', "POST");
    }
}