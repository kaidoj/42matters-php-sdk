<?php

namespace Kaidoj\SDK\Generator\Builder;

use DOMXPath;

class Parameters extends BaseBuild implements BuildInterface
{
    /**
     * Mappings for using different method names
     * @var string[]
     */
    protected $methodMappings = [
        'p' => 'package',
        'q' => 'query'
    ];

    /**
     * Mappings of types based on cell 4 content
     * @var string[][]
     */
    protected $typesMappings = [
        'bool' => [
            'true, false',
            'true or false'
        ]
    ];

    /**
     * Finds nodes defined in xpath query
     * Loops through them and returns formatted params
     * @param DOMXPath $xpath
     * @return array
     */
    public function build(DOMXPath $xpath): array
    {
        $response = [];
        $section = $xpath->query('//section[@id="request"]')->item(0);
        $tableRow = $xpath->query('.//tbody//tr', $section);
        foreach ($tableRow as $row) {
            $tds = $xpath->query('.//td', $row);
            $nameCol = $tds->item(0);
            if (!$nameCol) {
                continue;
            }

            $type = $this->formatType($tds->item(3)->nodeValue ?? null);
            $nameCol = $nameCol->nodeValue;
            if ($this->excludeParam($nameCol)) {
                continue;
            }

            $response[$nameCol] = [
                'method' => $this->formatMethod($nameCol),
                'type' => $type
            ];
        }

        return $response;
    }

    /**
     * Formats method include_unpublished to includeUnpublished
     * @param string $param
     * @return string
     */
    public function formatMethod(string $param): string
    {
        if (isset($this->methodMappings[$param])) {
            return $this->methodMappings[$param];
        }

        $param = str_replace(['_'], [' '], $param);
        return str_replace(' ', '', lcfirst(ucwords($param)));
    }

    /**
     * Returns type of the method param
     * @param string|null $value
     * @return string
     */
    public function formatType(?string $value = null): string
    {
        foreach ($this->typesMappings as $type => $mappings) {
            if (in_array($value, $mappings)) {
                return $type;
            }
        }

        return 'string';
    }
}