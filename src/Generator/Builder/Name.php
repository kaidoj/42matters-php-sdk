<?php
namespace Kaidoj\SDK\Generator\Builder;

use DOMXPath;

class Name extends BaseBuild implements BuildInterface
{
    public function build(DOMXPath $xpath): array
    {
        $section = $xpath->query('//section[@id="resource"]')->item(0);
        $address = $xpath->query('//div[@class="col-xs-9"]//p//span', $section)->item(1);
        if (!$address) {
           return [
               'object' => null,
               'name' => null,
               'uri' => null
           ];
        }

        $uri = $this->formatURI($address->nodeValue);
        return [
            'object' => $this->format($address->nodeValue),
            'name' => $this->formatName($uri),
            'uri' => $uri
        ];
    }

    /**
     * Formats name by_name.json to byName
     * @param string $name
     * @return string
     */
    public function format(string $name): string
    {
        $ex = explode('/', $name);
        $name = end($ex);
        $name = str_replace(['.json', '_'], ['', ' '], $name);
        return str_replace(' ', '', ucwords($name));
    }

    /**
     * Extracts URI from URL
     * @param string $name
     * @return string
     */
    public function formatURI(string $name): string
    {
        $ex = explode('/', $name);
        return end($ex);
    }

    /**
     * Formats name
     * @param string $name
     * @return string
     */
    public function formatName(string $name): string
    {
        return str_replace('.json', '', $name);
    }
}