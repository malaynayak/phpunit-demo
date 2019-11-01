<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use App\HttpBin;

class HttpTest extends TestCase
{
    private $http;
    private const ENDPOINT = 'https://httpbin.org/';

    public function setUp(): void
    {
        $this->http = new Client(['base_uri' => self::ENDPOINT]);
    }

    public function testGet() {
        $response = $this->http->request('GET');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetWithStub() {
        $stub = $this->createMock(HttpBin::class);
        
        // Configure the stub.
        $stub->method('getStatusCode')
            //->will($this->returnValue(200))
            ->willReturn(200);

        $this->assertEquals(200, $stub->getStatusCode());
    }

    public function testgetUserAgentWithMock() {

        $httpClientMock = $this->getMockBuilder(Client::class)
                    ->setMethods(array('__construct', 'request'))
                    ->setConstructorArgs([['base_uri' => self::ENDPOINT]])
                    ->getMock();

        $httpClientMock->expects($this->once()) // test if method is called only once
             ->method('request') // and method name is 'request'
             ->with('GET', '/user-agent');

        $httpBin = new HttpBin($httpClientMock);
        $httpBin->getUserAgent();
    }

    public function tearDown(): void {
        $this->http = null;
    }
}