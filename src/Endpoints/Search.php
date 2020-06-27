<?php
namespace Kaidoj\SDK\Endpoints;

/**
 * Class Search
 * @package Kaidoj\SDK\Endpoints
 */
class Search extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'search.json';

    public function query(string $query): Search
    {
        $this->params['q'] = $query;
        return $this;
    }

    public function includeDesc(): Search
    {
        $this->params['include_desc'] = true;
        return $this;
    }

    public function includeDeveloper(): Search
    {
        $this->params['include_developer'] = true;
        return $this;
    }
}