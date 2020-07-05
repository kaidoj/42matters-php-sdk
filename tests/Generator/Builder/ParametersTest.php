<?php

use Kaidoj\SDK\Generator\Builder\Parameters;

class ParametersTest extends BaseTestCase
{

    public function testShouldBuild()
    {
        $HTML = '<div id="request">
                    <table>
                        <tbody>
                            <tr>
                                <td>lookup</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>include_available</td>
                                <td></td>
                                <td></td>
                                <td>true, false</td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
        $t = new Parameters();
        $res = $t->build(\Kaidoj\SDK\Generator\Parser::fetchHTML($HTML));
        $this->assertEquals(2, count($res));
        $this->assertSame('lookup', $res['lookup']['method']);
        $this->assertSame('string', $res['lookup']['type']);
        $this->assertSame('includeAvailable', $res['include_available']['method']);
        $this->assertSame('bool', $res['include_available']['type']);
    }

    public function testShouldReturnFormattedMethod()
    {
        $t = new Parameters();
        $this->assertSame('package', $t->formatMethod('p'));
        $this->assertSame('includeUnpublished', $t->formatMethod('include_unpublished'));
    }

    public function testShouldFormatType()
    {
        $t = new Parameters();
        $this->assertSame('bool', $t->formatType('true, false'));
        $this->assertSame('string', $t->formatType('true, false1'));
    }
}