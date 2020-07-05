<?php
namespace Kaidoj\SDK;

use Kaidoj\SDK\Generator\Parser;

class Generator
{
    public static function run(): void
    {
        $parse = new Parser();
        $parse->parse();
    }


}