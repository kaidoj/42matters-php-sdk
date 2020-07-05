<?php
namespace Kaidoj\SDK\Generator\Builder;

class BaseBuild
{
    /**
     * We ignore these params as they are repeatable
     * @var string[]
     */
    protected $ignoreParams = [
        'access_token',
        'limit',
        'page',
        'lang',
        'app_country',
        'fields',
        'callback',
        'available_in'
    ];

    /**
     * Check and returns if parameter is allowed as object param
     * @param string $param
     * @return bool
     */
    public function excludeParam(string $param): bool
    {
        return in_array($param, $this->ignoreParams);
    }
}