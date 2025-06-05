<?php

namespace App\Helpers;

use Config\Services;
use Exception;

class NicepayCons{

    private const SANDBOX_BASE_URL = "https://dev.nicepay.co.id/nicepay/";
    private const PRODUCTION_BASE_URL = "https://www.nicepay.co.id/nicepay/";

    private const CLOUD_SANDBOX_BASE_URL = "https://dev-services.nicepay.co.id/nicepay/";
    private const CLOUD_PRODUCTION_BASE_URL = "https://services.nicepay.co.id/nicepay/";

    private const V2_REGISTRATION_ENDPOINT = "direct/v2/registration";
    private const V2_INQUIRY_ENDPOINT = "direct/v2/inquiry";
    private const CANCEL_V2_ENDPOINT = "direct/v2/cancel";
    private const PAYMENT_V2_ENDPOINT = "direct/v2/payment";

    public static function getSandboxBaseUrl($isCloudServer) : string{
        if ($isCloudServer) {
            return self::CLOUD_SANDBOX_BASE_URL;
        }
        return self::SANDBOX_BASE_URL;
    }
    
    public static function getProductionBaseUrl($isCloudServer) : string{
        if ($isCloudServer) {
            return self::CLOUD_PRODUCTION_BASE_URL;
        }
        return self::PRODUCTION_BASE_URL;
    }

    public static function getV2RegistrationEndpoint() : string{
        return self::V2_REGISTRATION_ENDPOINT;
    }

    public static function getV2InquiryStatusEndpoint() : string{
        return self::V2_INQUIRY_ENDPOINT;
    }

    public static function getV2CancelEndpoint() {
        return self::CANCEL_V2_ENDPOINT;
    }

    public static function getV2PaymentEndpoint() {
        return self::PAYMENT_V2_ENDPOINT;
    }
    
}


