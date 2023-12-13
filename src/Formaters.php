<?php

namespace Gendiff\Formaters;

use function Gendiff\Formaters\Stylish\formatStylish;
use function Gendiff\Formaters\Plain\formatPlain;

// use function Gendiff\Formaters\Json\formatJson;

function formatResult(array $tree, string $format): string
{
    switch ($format) {
        case 'stylish':
            return formatStylish($tree);
        case 'plain':
            return formatPlain($tree);
        // case 'json':
        //     return formatJson($tree);
        default:
            throw new \Exception("{$format} is invalid format");
    }
}
