<?php

use Kaidoj\SDK\Generator\Builder\Name;

class NameTest extends BaseTestCase
{
    public function testShouldReturnFormattedName()
    {
        $t = new Name();
        $this->assertSame('Lookup', $t->format('url/lookup.json'));
        $this->assertSame('BySdk', $t->format('url/by_sdk.json'));
        $this->assertSame('BySdkThing', $t->format('url/by_sdk_thing.json'));
    }
}