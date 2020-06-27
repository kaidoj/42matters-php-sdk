<?php
namespace Kaidoj\SDK\Endpoints;

/**
 * Class Lookup
 * @package Kaidoj\SDK\Endpoints
 */
class Lookup extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'lookup.json';

    public function package(string $package): Lookup
    {
        $this->params['p'] = $package;
        return $this;
    }

    public function id(string $id): Lookup
    {
        $this->params['id'] = $id;
        return $this;
    }

    public function bundleId(string $id): Lookup
    {
        $this->params['bundleId'] = $id;
        return $this;
    }

    public function includeUnpublished(): Lookup
    {
        $this->params['include_unpublished'] = true;
        return $this;
    }
}