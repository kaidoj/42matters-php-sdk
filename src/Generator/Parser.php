<?php
namespace Kaidoj\SDK\Generator;

use DOMDocument;
use DOMXPath;
use Generator;

class Parser
{
    /**
     * @var string[]
     */
    protected $endpointsToInclude = [
      '/docs/app-market-data/android/',
      '/docs/app-market-data/ios/',
    ];

    /**
     * @var string
     */
    protected $host = 'https://42matters.com';

    /**
     * We parse endpoints links from this URL
     * @var string
     */
    protected $endpointsURL = '/docs/overview';

    /**
     * @var Writer
     */
    protected $writer;

    public function __construct()
    {
        $this->writer = new Writer();
    }

    /**
     * Main parse method
     * @return Parser
     */
    public function parse(): Parser
    {
        $params = [];
        $names = [];
        foreach ($this->getEndpoints() as $key => $endpoint) {
            // skip advanced query for now
            if (strpos($endpoint, 'query') !== false) {
                continue;
            }

            $builder = Builder::build($this->fetchHTML(file_get_contents(
                $this->host . $endpoint
            )));

            $name = $builder->getName();
            if (empty($name['uri'])) {
                continue;
            }

            $names[$name['name']] = $name;
            $params = $this->mergeParams($builder, $name, $params);
        }

        $this->write($names, $params);
        unset($names);
        unset($params);

        return $this;
    }

    /**
     * Parser endpoints from endpoints url
     * @return Generator
     */
    public function getEndpoints(): Generator
    {
        $xpath = $this->fetchHTML(file_get_contents($this->host . $this->endpointsURL));
        $navNodes = $xpath->query('//div[@class="sidebar-nav docs-nav"]//li//a');
        foreach ($navNodes as $node) {
            $href = $node->getAttribute('href');
            if (!$this->allowedEndpoint($href)) {
               continue;
            }
            yield $href;
        }
    }

    /**
     * Check if endpoint is in allowed list
     * @param string $endpoint
     * @return bool
     */
    public function allowedEndpoint(string $endpoint): bool
    {
        foreach ($this->endpointsToInclude as $allowed) {
            if (strpos($endpoint, $allowed) !== false) {
                return true;
            }
        }

        return false;
    }


    /**
     * Returns XPath object from HTML
     * @param string $HTML
     * @return DOMXPath
     */
    public static function fetchHTML(string $HTML): DOMXPath
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($HTML);
        return new DOMXPath($dom);
    }

    /**
     * Write endpoint files
     * @param array $names
     * @param array $params
     * @return $this
     */
    public function write(array $names, array $params): Parser
    {
        foreach ($names as $name) {
            if (!isset($params[$name['name']])) {
                continue;
            }

            $this->writer->write($name, $params[$name['name']]);
        }

        return $this;
    }

    /**
     * Merges params based on object name
     * @param Builder $builder
     * @param array $object
     * @param array $params
     * @return array
     */
    public function mergeParams(Builder $builder, array $object, array $params): array
    {
        if (isset($params[$object['name']])) {
            $params[$object['name']] = array_merge(
                $params[$object['name']],
                $builder->getParams()
            );
            return $params;
        }

        $params[$object['name']] = $builder->getParams();
        return $params;
    }
}