<?php
namespace Kaidoj\SDK;

use Kaidoj\SDK\Endpoints\EndpointInterface;
use Kaidoj\SDK\Exceptions\EndpointDoesNotExistException;

class Client
{
    /**
     * @var Config $config
     */
    protected $config;

    /**
     * @var string $uri
     */
    protected $uri;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->config->setURL($this->config->getURL() . $this->uri);
    }

    /**
     * Calls endpoint based on name
     * @param $method
     * @param $args
     * @return EndpointInterface
     * @throws EndpointDoesNotExistException
     */
    public function __call($method, $args): EndpointInterface
    {
        $endpoint = $this->getEndpoint($method);
        $endpoint = new $endpoint($this->config);
        return $endpoint;
    }

    /**
     * Returns endpoint name
     * @param string $name
     * @return string
     * @throws EndpointDoesNotExistException
     */
    public function getEndpoint(string $name): string
    {
        $name = str_replace(['-'], [''], ucwords($name));
        $name = 'Kaidoj\SDK\Endpoints\\Generated\\' . $name;
        if (!class_exists($name)) {
            throw new EndpointDoesNotExistException($name);
        }
        return $name;
    }
}