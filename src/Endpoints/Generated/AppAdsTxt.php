<?php
namespace Kaidoj\SDK\Endpoints\Generated;

use Kaidoj\SDK\Endpoints\Endpoint;
use Kaidoj\SDK\Endpoints\EndpointInterface;

/**
 * This is autogenerated endpoint at 05.07.2020 08:53:21
 * Class AppAdsTxt
 * @package Kaidoj\SDK\Endpoints\Generated
 */
class AppAdsTxt extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'app_ads_txt.json';

        /**
     * @param string package
     * @return AppAdsTxt
     */
    public function package(string $package): AppAdsTxt
    {
        $this->params['p'] = $package;
        return $this;
    }

    /**
     * @param bool includeUnpublished
     * @return AppAdsTxt
     */
    public function includeUnpublished(bool $includeUnpublished = true): AppAdsTxt
    {
        $this->params['include_unpublished'] = $includeUnpublished;
        return $this;
    }

    /**
     * @param string id
     * @return AppAdsTxt
     */
    public function id(string $id): AppAdsTxt
    {
        $this->params['id'] = $id;
        return $this;
    }

    /**
     * @param string bundleId
     * @return AppAdsTxt
     */
    public function bundleId(string $bundleId): AppAdsTxt
    {
        $this->params['bundleId'] = $bundleId;
        return $this;
    }


}