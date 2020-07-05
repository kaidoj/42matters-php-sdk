<?php
namespace Kaidoj\SDK\Generator\Builder;

interface BuildInterface
{
    /**
     * Main build method
     * @param \DOMXPath $xpath
     * @return array
     */
    public function build(\DOMXPath $xpath): array;
}