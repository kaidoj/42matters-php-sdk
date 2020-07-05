<?php

namespace Kaidoj\SDK\Generator;

class Writer
{
    /**
     * @var string
     */
    protected $endpointsPath = 'Endpoints/Generated/';

    /**
     * @var string
     */
    protected $templatesPath = 'Templates/';

    /**
     * @var string
     */
    protected $objectTemplate = 'EndpointObject';

    /**
     * @var string
     */
    protected $methodTemplates = [
        'string' => 'EndpointMethodString',
        'bool' => 'EndpointMethodBool'
    ];

    public function __construct()
    {
        $this->endpointsPath = __DIR__ . '/../' . $this->endpointsPath;
        $this->templatesPath = __DIR__ . '/' . $this->templatesPath;
        $this->loadMethodTemplates();
    }

    /**
     * Writes endpoint files
     * @param array $name
     * @param array $parameters
     * @return $this
     */
    public function write(array $name, array $parameters): Writer
    {
        if (empty($name['object'])) {
            return $this;
        }

        $contents = file_get_contents($this->templatesPath . $this->objectTemplate);
        $contents = str_replace(
            [
                '{name}',
                '{uri}',
                '{datetime}',
                '{methods}'
            ],
            [
                $name['object'],
                $name['uri'],
                date('d.m.Y H:i:s'),
                $this->buildMethods($name, $parameters)
            ],
            $contents
        );
        file_put_contents(
            $this->endpointsPath . $name['object'] . '.php',
            $contents
        );

        return $this;
    }

    /**
     * Builds method strings using method templates
     * @param array $name
     * @param array $parameters
     * @return string
     */
    public function buildMethods(array $name, array $parameters): string
    {
        $contents = '';
        foreach ($parameters as $paramName => $param) {
            $contents .= str_replace(
                ['{object}', '{paramName}', '{param}'],
                [$name['object'], $param['method'], $paramName],
                $this->methodTemplates[$param['type']]
            );
        }
        return $contents;
    }

    /**
     * Load method template contents into array
     * @return Writer
     */
    public function loadMethodTemplates(): Writer
    {
        foreach ($this->methodTemplates as $type => $template) {
            $this->methodTemplates[$type] = file_get_contents($this->templatesPath . $template);
        }

        return $this;
    }
}