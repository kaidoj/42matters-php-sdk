<?php

class ParserTest extends BaseTestCase
{
    public function testShouldMergeParams()
    {
        $mockParams = [
            'p' => 'packages',
            'bundle_id' => 'bundleId'
        ];

        $object = [
            'uri' => 'lookup.json',
            'name' => 'lookup',
            'object' => 'Lookup'
        ];

        $params = [
            'lookup' => []
        ];

        $builderMock = $this->createMock(\Kaidoj\SDK\Generator\Builder::class);
        $builderMock->method('getParams')->willReturn($mockParams);
        $t = new \Kaidoj\SDK\Generator\Parser();
        for ($i = 1; $i <= 2; $i++) {
            $params = $t->mergeParams($builderMock, $object, $params);
        }
        $this->assertSame([
            'lookup' => [
                'p' => 'packages',
                'bundle_id' => 'bundleId'
            ]
        ], $params);
    }
}