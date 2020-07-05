<?php

use Kaidoj\SDK\Endpoints\Generated\Lookup;
use Kaidoj\SDK\Config;

class LookupTest extends BaseTestCase
{
    public function testShouldReturnParams()
    {
        $expect = [
            'p' => 'com.test',
            'id' => '123',
            'app_country' => 'US',
            'include_unpublished' => true,
            'lang' => 'EN',
            'fields' => 'test1,test2',
            'callback' => 'testCallback'
        ];

        $t = new Lookup(new Config($this->testToken));
        $t->package('com.test')
            ->id('123')
            ->appCountry('US')
            ->includeUnpublished()
            ->lang('EN')
            ->fields('test1,test2')
            ->callback('testCallback');

        $this->assertSame($expect, $t->getParams());
    }
}