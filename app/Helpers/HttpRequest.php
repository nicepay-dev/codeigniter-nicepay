<?php

namespace App\Helpers;

use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Exception;

class HttpRequest
{
    protected $client;

    public function __construct()
    {
        // Load the CURLRequest service
        $this->client = Services::curlrequest();
    }

    /**
     * Wrapper of CodeIgniter's CURLRequest to make API request to Nicepay API
     * @param array $headers
     * @param string $requestUrl
     * @param mixed $requestBody
     * @param string $method
     * @param bool $isRetryFlag
     * @param int $retryLimit
     * @return mixed API response, or throws an exception during request
     */
    public function request($headers, $requestUrl, $requestBody, $method = 'POST', $isRetryFlag = false, $retryLimit = 3)
    {
        $attempt = 0;
        $timeoutErrorCodes = [CURLE_OPERATION_TIMEOUTED, CURLE_COULDNT_CONNECT];

        do {
            try {
                // Build options for the request
                $options = [
                    'headers' => $headers,
                    'timeout' => 15,  // Timeout in seconds
                    'http_errors' => false, // Disable automatic exception throwing on HTTP errors
                    'verify'=> false, //for local testing only
                ];

                // Add request body for POST, PUT, PATCH, DELETE
                if (in_array(strtoupper($method), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                    $options['body'] = $requestBody;
                }

                // Make the request
                $response = $this->client->request(strtoupper($method), $requestUrl, $options);
                
                
                $statusCode = $response->getStatusCode();
                $responseBody = $response->getBody();

                // Check for successful response (2xx HTTP codes)
                if ($statusCode >= 200 && $statusCode < 300) {
                    $jsonResponse = json_decode($responseBody, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $response;
                    } else {
                        throw new Exception("Failed to parse response as JSON: " . json_last_error_msg() . "\nResponse: " . $responseBody);
                    }
                }

                // Retry on Gateway Timeout (504) or other retryable conditions
                if ($isRetryFlag && $statusCode === 504 && $attempt < $retryLimit) {
                    $attempt++;
                    sleep(1); // wait 1 second before retrying
                    continue;
                }

                // Handle non-retryable errors
                $decodedResponse = json_decode($responseBody, true);
                throw new Exception("HTTP Error $statusCode: " . print_r($decodedResponse, true));

            } catch (HTTPException $e) {
                // Handle connection errors or timeout
                if ($isRetryFlag && in_array($e->getCode(), $timeoutErrorCodes) && $attempt < $retryLimit) {
                    $attempt++;
                    sleep(1); // wait before retrying
                    continue;
                }
                throw new Exception("HTTP request failed: " . $e->getMessage());
            }
        } while ($isRetryFlag && $attempt <= $retryLimit);

        
        // If retries are exhausted, return the last response or throw an error
        return $response ?? null;
    }

    /**
     * Sends a request to the given URL with the given body and headers and returns the response.
     * If the request fails due to a timeout or connection error, it will retry up to the given retry limit.
     * If the request receives a 504 Gateway Timeout, it will also retry up to the given retry limit.
     * If all retries are exhausted, it will throw a NicepayError exception.
     *
     * @param array $headers The headers to send with the request
     * @param string $requestUrl The URL to send the request to
     * @param string $requestBody The body of the request
     * @param string $method The HTTP method to use for the request
     * @param bool $isRetryFlag Whether to retry if the request fails
     * @param int $retryLimit The number of times to retry if the request fails
     * @return string The response from the server
     * @throws Exception If the request fails or all retries are exhausted
     */ 
    public function requestWithUrlEncodedBody($headers, $requestUrl, $requestBody, $method, $isRetryFlag, $retryLimit)
    {
        $attempt = 0;
        $timeoutErrorCodes = [CURLE_OPERATION_TIMEOUTED, CURLE_COULDNT_CONNECT];

        do {
            $ch = curl_init();

            // Set URL and request method
            curl_setopt($ch, CURLOPT_URL, $requestUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

            // Add body for applicable methods
            if (in_array(strtoupper($method), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
            }

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            if (getenv('APP_ENV') === 'local') {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            }
            curl_setopt($ch, CURLOPT_TIMEOUT, 15); // Set timeout to 15 seconds
            // Execute request
            $response = curl_exec($ch);

            // Check if curl request failed (e.g., timeout)
            if (curl_errno($ch)) {
                $errorCode = curl_errno($ch);
                $errorMsg = curl_error($ch);
                curl_close($ch);

                // Check if it's a timeout or connection error and retry if applicable
                if ($isRetryFlag && in_array($errorCode, $timeoutErrorCodes) && $attempt < $retryLimit) {
                    $attempt++;
                    sleep(1); // Wait 1 second before retrying
                    continue;
                }

                // If not retryable, throw an exception
                throw new Exception($errorMsg);
            }

            // Get the HTTP response code
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // If the request was successful (HTTP 2xx), return the response as HTML
            if ($httpCode >= 200 && $httpCode < 300) {
                return $response; // Return HTML response directly
            }

            // If HTTP 504 (Gateway Timeout), retry if applicable
            if ($isRetryFlag && $httpCode === 504 && $attempt < $retryLimit) {
                $attempt++;
                sleep(1); // Wait before retrying
                continue;
            }

            // Throw an exception for non-retryable HTTP errors
            throw new Exception("HTTP Error $httpCode: " . $response);
        } while ($isRetryFlag && $attempt < $retryLimit);  // Ensure retry limit is correctly checked

        // If all retries are exhausted or no response is received
        throw new Exception("All retry attempts exhausted.");
    }
}
