<?php
namespace Kaidoj\SDK\Endpoints\Generated;

use Kaidoj\SDK\Endpoints\Endpoint;
use Kaidoj\SDK\Endpoints\EndpointInterface;

/**
 * This is autogenerated endpoint at 05.07.2020 08:53:21
 * Class Availability
 * @package Kaidoj\SDK\Endpoints\Generated
 */
class Availability extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'availability.json';

        /**
     * @param string package
     * @return Availability
     */
    public function package(string $package): Availability
    {
        $this->params['p'] = $package;
        return $this;
    }

    /**
     * @param string country
     * @return Availability
     */
    public function country(string $country): Availability
    {
        $this->params['country'] = $country;
        return $this;
    }

    /**
     * @param string id
     * @return Availability
     */
    public function id(string $id): Availability
    {
        $this->params['id'] = $id;
        return $this;
    }

    /**
     * @param string bundleId
     * @return Availability
     */
    public function bundleId(string $bundleId): Availability
    {
        $this->params['bundleId'] = $bundleId;
        return $this;
    }


}