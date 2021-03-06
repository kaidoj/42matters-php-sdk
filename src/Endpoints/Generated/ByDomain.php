<?php
namespace Kaidoj\SDK\Endpoints\Generated;

use Kaidoj\SDK\Endpoints\Endpoint;
use Kaidoj\SDK\Endpoints\EndpointInterface;

/**
 * This is autogenerated endpoint at 05.07.2020 08:53:21
 * Class ByDomain
 * @package Kaidoj\SDK\Endpoints\Generated
 */
class ByDomain extends Endpoint implements EndpointInterface
{
    /**
     * @var string $uri
     */
    protected $uri = 'by_domain.json';

        /**
     * @param string domainSearchTerm
     * @return ByDomain
     */
    public function domainSearchTerm(string $domainSearchTerm): ByDomain
    {
        $this->params['domain_search_term'] = $domainSearchTerm;
        return $this;
    }

    /**
     * @param string domainSearchIn
     * @return ByDomain
     */
    public function domainSearchIn(string $domainSearchIn): ByDomain
    {
        $this->params['domain_search_in'] = $domainSearchIn;
        return $this;
    }

    /**
     * @param bool domainExactMatch
     * @return ByDomain
     */
    public function domainExactMatch(bool $domainExactMatch = true): ByDomain
    {
        $this->params['domain_exact_match'] = $domainExactMatch;
        return $this;
    }


}