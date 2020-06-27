<?php
namespace Kaidoj\SDK\Endpoints;

use Kaidoj\SDK\Config;

class Endpoint
{
    /**
     * @var Config $config
     */
    protected $config;

    /**
     * @var string $method
     */
    protected $method = 'GET';

    /**
     * @var array $params
     */
    protected $params = [];

    /**
     * @var string $uri
     */
    protected $uri;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Main request method that returns JSON response as a array
     * @return array
     */
    public function fetch(): array
    {
        $options = [
            'query' => [
                'access_token' => $this->config->getAccessToken()
            ]
        ];

        if ($this->method === 'PUT' || $this->method === 'POST') {
            $options['body'] = $this->params;
        } else {
            $options['query'] = $options['query'] + $this->params;
        }

        $uri = $this->config->getURL() . $this->uri;
        $response = $this->config->getHttpClient()->request($this->method, $uri, $options);

        if (method_exists($response, 'getBody')) {
            return json_decode((string) $response->getBody(), true);
        }
        return json_decode((string) $response, true);
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function lang(string $id): Endpoint
    {
        $this->params['lang'] = $id;
        return $this;
    }

    public function appCountry(string $id): Endpoint
    {
        $this->params['app_country'] = $id;
        return $this;
    }

    public function fields(string $fields): Endpoint
    {
        $this->params['fields'] = $fields;
        return $this;
    }

    public function callback(string $callback): Endpoint
    {
        $this->params['callback'] = $callback;
        return $this;
    }

    public function limit(int $limit): Endpoint
    {
        $this->params['limit'] = $limit;
        return $this;
    }

    public function page(int $page): Endpoint
    {
        $this->params['page'] = $page;
        return $this;
    }

    public function availableIn(string $countryCode): Endpoint
    {
        $this->params['available_in'] = $countryCode;
        return $this;
    }
}