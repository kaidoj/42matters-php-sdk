<?php
namespace Kaidoj\SDK;

class Config
{
    /**
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * @var HttpClientInterface $httpClient
     */
    protected $httpClient;

    /**
     * @var string URL
     */
    protected $URL = 'https://data.42matters.com/api/v2.0/';

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return Config
     */
    public function setAccessToken(string $accessToken): Config
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient(): HttpClientInterface
    {
        if (!$this->httpClient) {
            $this->httpClient = new HttpClient([
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]);
        }
        return $this->httpClient;
    }

    /**
     * @param HttpClientInterface $httpClient
     * @return Config
     */
    public function setHttpClient(HttpClientInterface $httpClient): Config
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getURL(): string
    {
        return $this->URL;
    }

    /**
     * @param string $URL
     * @return Config
     */
    public function setURL(string $URL): Config
    {
        $this->URL = $URL;
        return $this;
    }

}