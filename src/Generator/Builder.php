<?php

namespace Kaidoj\SDK\Generator;

use Kaidoj\SDK\Generator\Builder\Name;
use Kaidoj\SDK\Generator\Builder\Parameters;
use DOMXPath;

class Builder
{
    /**
     * @var array
     */
    protected $name = [];

    /**
     * @var array
     */
    protected $params = [];

    /**
     * Start builder
     * @param DOMXPath $HTML
     * @return Builder
     */
    public static function build(DOMXPath $HTML): Builder
    {
        $builder = new Builder();
        $builder->run($HTML);
        return $builder;
    }

    /**
     * Run builder
     * @param DOMXPath $HTML
     * @return void
     */
    public function run(DOMXPath $HTML): void
    {
        $this->name = (new Name())->build($HTML);
        $this->params = (new Parameters())->build($HTML);
    }

    /**
     * @return array
     */
    public function getName(): array
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}