<?php

namespace App\Libraries;

use App\Models\{NicepayV2Response, NicepayV2RedirectResponse, NICEPay};
use App\Helpers\Helper;
use CodeIgniter\HTTP\ResponseInterface;
use App\Helpers\HttpRequest;

class NicepayV2
{
    private NICEPay $apiConfig;
    private $httpClient;
    private $helper;

    public function __construct(NICEPay $config)
    {
        $this->apiConfig = $config;
        $this->httpClient = new HttpRequest();  // Use CodeIgniter's CURLRequest service
        $this->helper = new Helper();
    }

    /**
     * Request a transaction to NICEPAY V2 API.
     *
     * @param mixed $parameter the request body
     * @param string $endPoint the API endpoint
     * @param string $method the HTTP method
     *
     * @return NicepayV2Response the response from the API
     */

    public function requestV2Transaction($parameter, $endPoint, $method) :NicepayV2Response {
        
        $config = $this->apiConfig;

        // Generate merchantToken 
        $parameter -> setMerchantToken(Helper::generateMerchantToken($parameter->getMerchantToken()));

        $jsonData = json_encode($parameter->toArrayV2());
        $url = $this->apiConfig->getNicepayBaseUrl() . $endPoint;
        $headers = self::getHeaders();
        
        $response = $this->httpClient->request($headers, $url, $jsonData, $method, $config->isRetryFlag(), $config->getRetryCount());

        // CI Response convert to Array then to Class NicepayV2Response
        $responseBodyArray = json_decode($response->getBody(), true);

        return NicepayV2Response::fromArray($responseBodyArray);
    }

    public function requestV2RedirectTransaction($parameter, $endPoint, $method) :NicepayV2RedirectResponse {
        
        $config = $this->apiConfig;

        // Generate merchantToken 
        $parameter -> setMerchantToken(Helper::generateMerchantToken($parameter->getMerchantToken()));

        $jsonData = json_encode($parameter->toArrayV2());
        $url = $this->apiConfig->getNicepayBaseUrl() . $endPoint; 
        $headers = self::getHeaders();

        $response = $this->httpClient->request($headers, $url, $jsonData, $method, $config->isRetryFlag(), $config->getRetryCount());

        // CI Response convert to Array then to Class NicepayV2Response
        $responseBodyArray = json_decode($response->getBody(), true);

        return NicepayV2RedirectResponse::fromArray($responseBodyArray);
    }

    public function requestV2TransactionUrlencodedBody($parameter, $endPoint, $method) {
        
        $config = $this->apiConfig;

        // generate merchantToken 
        $parameter -> setMerchantToken(Helper::generateMerchantToken($parameter->getMerchantToken()));
        $url = $this->apiConfig->getNicepayBaseUrl() . $endPoint;
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $encodedBody = http_build_query($parameter->toArrayPayment());

        $response = $this->httpClient->requestWithUrlEncodedBody($headers, $url, $encodedBody, $method, $config->isRetryFlag(), $config->getRetryCount());

        // CI Response convert to Array then to Class NicepayV2Response
        // $responseBodyArray = json_decode($response->getBody(), true);

        return $response;
    }

    

    private function getHeaders():array 
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
