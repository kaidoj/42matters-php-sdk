<?php
namespace Kaidoj\SDK\Endpoints\Generated;

use Kaidoj\SDK\Endpoints\Endpoint;
use Kaidoj\SDK\Endpoints\EndpointInterface;

/**
 * This is autogenerated endpoint at 05.07.2020 08:53:21
 * Class Audience
 * @package Kaidoj\SDK\Endpoints\Generated
 */
class Audience extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'audience.json';

        /**
     * @param string package
     * @return Audience
     */
    public function package(string $package): Audience
    {
        $this->params['p'] = $package;
        return $this;
    }

    /**
     * @param string country
     * @return Audience
     */
    public function country(string $country): Audience
    {
        $this->params['country'] = $country;
        return $this;
    }


}