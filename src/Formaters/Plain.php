<?php

namespace Differ\Formaters\Plain;

function convertToStr(mixed $value)
{
    if ($value === true) {
        return 'true';
    }
    if ($value === false) {
        return 'false';
    }
    if ($value === null) {
        return 'null';
    }
    if (is_array($value)) {
        return '[complex value]';
    }
    return is_numeric($value) ? $value : "'$value'";
}

function walkTree(array $tree, array $path = [])
{
    $lines = array_map(
        function ($node) use ($path) {
            array_push($path, $node['key']);
            $fullPath = implode('.', $path);
            switch ($node['action']) {
                case 'added':
                    $normValue = convertToStr($node["value1"]);
                    $result = "Property '$fullPath' was added with value: $normValue";
                    break;
                case 'removed':
                    $result = "Property '$fullPath' was removed";
                    break;
                case 'changed':
                    $normValue1 = convertToStr($node["value1"]);
                    $normValue2 = convertToStr($node["value2"]);
                    $result = "Property '$fullPath' was updated. From $normValue1 to $normValue2";
                    break;
                case 'nested':
                    $result = walkTree($node["children"], $path);
                    break;
                default:
                    $result = '';
            }
            // array_pop($path);
            return $result;
        },
        $tree
    );
    return implode("\n", array_filter($lines));
}

function formatPlain(array $tree)
{
    return walkTree($tree);
}
