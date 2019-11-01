<?php 

namespace App;

use Exception;
use GuzzleHttp\Client;

class HttpBin {
    
    private $http;

    public function __construct(Client $client)
    {
        $this->http = $client;
    }

    public function getUserAgent() {
        $response = $this->http->request('GET', '/user-agent');
        if ($response) {
            $userAgent = json_decode($response->getBody())->{"user-agent"};
            return $userAgent;
        } else  {
            return null;
        }
    }

    public function getStatusCode() {
        $response = $this->http->request('GET');
        return ($response) ?? $response->getStatusCode();
    }
}