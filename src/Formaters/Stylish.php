<?php

namespace Gendiff\Formaters\Stylish;

function convertToStr($value)
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
    return (string) $value;
}

function stylish($tree)
{
    $lines = ['{'];
    foreach ($tree as $node) {
        $key = $node["key"];
        $value1 = convertToStr($node["value1"]);
        switch ($node["action"]) {
            case 'added':
                $lines[] = "  + {$key}: {$value1}";
                break;
            case 'removed':
                $lines[] = "  - {$key}: {$value1}";
                break;
            case 'same':
                $lines[] = "    {$key}: {$value1}";
                break;
            case 'changed':
                $value2 = convertToStr($node["value2"]);
                $lines[] = "  - {$key}: {$value1}";
                $lines[] = "  + {$key}: {$value2}";
        }
    }
    $lines[] = "}\n";
    return join("\n", $lines);
}



/*     def convert_to_str(value, indent):
    if value is None:
        return 'null'
    if isinstance(value, str):
        return value
    if isinstance(value, dict):
        keys = value.keys()
        indent += '    '
        lines = ['{']
        for key in keys:
            lines.append(f"{indent}    {key}: "
                         f"{convert_to_str(value[key], indent)}")
        lines.append(indent + '}')
        return '\n'.join(lines)
    return str(value).lower()


def _walk(tree, depth=0):
    indent = '    ' * depth
    lines = ['{']
    for node in tree:
        key = node["key"]
        value1 = convert_to_str(node.get("value1"), indent)
        value2 = convert_to_str(node.get("value2"), indent)
        if node["action"] == "nested":
            lines.append(f'{indent}    {key}: '
                         f'{_walk(node["children"], depth + 1)}')
            continue
        if node["action"] == "added":
            lines.append(f'{indent}  + {key}: {value1}')
            continue
        if node["action"] == "removed":
            lines.append(f'{indent}  - {key}: {value1}')
            continue
        if node["action"] == "same":
            lines.append(f'{indent}    {key}: {value1}')
            continue

        lines.append(f'{indent}  - {key}: {value1}')
        lines.append(f'{indent}  + {key}: {value2}')

    lines.append(indent + '}')
    return '\n'.join(lines)


def stylish(tree):
    return _walk(tree) */
