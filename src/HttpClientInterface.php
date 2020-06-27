<?php
namespace Kaidoj\SDK;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return mixed
     */
    public function request(string $method, string $uri, array $options = []);
}