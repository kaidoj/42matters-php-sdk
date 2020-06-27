<?php

class IOSTest extends BaseTestCase
{
    public function testDoesCallEndpoint()
    {
        $httpClientMock = $this->createMock(Kaidoj\SDK\HttpClient::class);
        $httpClientMock->method('request')
            ->willReturn('{"test": 1}');
        $config = new Kaidoj\SDK\Config($this->testToken);
        $config->setHttpClient($httpClientMock);
        $t = new Kaidoj\SDK\IOS($config);
        $resp = $t->lookup()->id('com.test')->fetch();
        $this->assertSame(1, $resp['test']);
    }

    public function testDoesThrowException()
    {
        $this->expectException(Kaidoj\SDK\Exceptions\EndpointDoesNotExistException::class);
        $this->expectExceptionMessage(
            'Endpoint \'Kaidoj\SDK\Endpoints\FakeMethod\' does not exist'
        );
        $httpClientMock = $this->createMock(Kaidoj\SDK\HttpClient::class);
        $httpClientMock->method('request')->willReturn('{"test": 1}');
        $config = new Kaidoj\SDK\Config($this->testToken);
        $config->setHttpClient($httpClientMock);
        $t = new Kaidoj\SDK\IOS($config);
        $t->fakeMethod([]);
    }
}