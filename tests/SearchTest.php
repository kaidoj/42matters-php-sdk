<?php

use Kaidoj\SDK\Config;
use Kaidoj\SDK\Endpoints\Search;

class SearchTest extends BaseTestCase
{
    public function testShouldReturnParams()
    {
        $expect = [
            'q' => 'test',
            'include_desc' => true,
            'include_developer' => true,
            'limit' => 10,
            'page' => 2,
            'available_in' => 'US',
            'app_country' => 'US',
            'lang' => 'EN',
            'fields' => 'test1,test2',
            'callback' => 'testCallback'
        ];

        $t = new Search(new Config($this->testToken));
        $t->query('test')
            ->includeDesc()
            ->includeDeveloper()
            ->limit(10)
            ->page(2)
            ->availableIn('US')
            ->appCountry('US')
            ->lang('EN')
            ->fields('test1,test2')
            ->callback('testCallback');

        $this->assertSame($expect, $t->getParams());
    }
}