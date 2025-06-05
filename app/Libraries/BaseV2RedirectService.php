<?php

namespace App\Libraries;

use App\Models\{NicepayV2Response, NicepayV2RedirectResponse, NICEPay, InquiryStatus, Cancel};

class BaseV2RedirectService
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
     * @return NicepayV2RedirectResponse The response from the registration API
     */
    public function registration($requestBody): NicepayV2RedirectResponse
    {
        return $this->v2Service->requestV2RedirectTransaction($requestBody, 'redirect/v2/registration', "POST");
    }

    /**
     * Inquiry Status API for V2
     *
     * @param InquiryStatus $requestBody The request body for inquiry status
     * @return NicepayV2Response The response from the inquiry status API
     */
    public function inquiryStatus(InquiryStatus $requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'direct/v2/inquiry', "POST");
    }

    /**
     * Cancel / Refund API for V2
     *
     * @param Cancel $requestBody The request body for cancel
     * @return NicepayV2Response The response from the cancel API
     */
    public function cancel(Cancel $requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, 'direct/v2/cancel', "POST");
    }
}