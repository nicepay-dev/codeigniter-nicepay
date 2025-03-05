<?php

namespace App\Helpers;

use Config\Services;
use Exception;

class NicepayCons{

    private const SANDBOX_BASE_URL = "https://dev.nicepay.co.id/nicepay/";
    private const PRODUCTION_BASE_URL = "https://www.nicepay.co.id/nicepay/";

    private const CLOUD_SANDBOX_BASE_URL = "https://dev-services.nicepay.co.id/nicepay/";
    private const CLOUD_PRODUCTION_BASE_URL = "https://services.nicepay.co.id/nicepay/";

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
    
}


