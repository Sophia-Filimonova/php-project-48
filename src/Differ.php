<?php

namespace Gendiff\Differ;

use function Gendiff\Formaters\Stylish\stylish;

function generateDiffTree($data1, $data2)
{
    $keys = array_unique(array_merge(array_keys($data1), array_keys($data2)));
    sort($keys);
    $tree = [];
    foreach ($keys as $key) {
        $node = ['key' => $key];
        if (!array_key_exists($key, $data1)) {
            $node['action'] = 'added';
            $node['value1'] = $data2[$key];
        } elseif (!array_key_exists($key, $data2)) {
            $node['action'] = 'removed';
            $node['value1'] = $data1[$key];
        } else {
            if ($data1[$key] === $data2[$key]) {
                $node['action'] = 'same';
                $node['value1'] = $data1[$key];
            } else {
                $node["action"] = "changed";
                $node["value1"] = $data1[$key];
                $node["value2"] = $data2[$key];
            }
        }
        $tree[] = $node;
    }
    return $tree;
}

function genDiff($pathToFile1, $pathToFile2)
{
    if (!str_starts_with($pathToFile1, '/')) {
        $pathToFile1 = getcwd() . '/' . $pathToFile1;
    }
    if (!str_starts_with($pathToFile2, '/')) {
        $pathToFile2 = getcwd() . '/' . $pathToFile2;
    }
    $data1 = json_decode(file_get_contents($pathToFile1), true);
    $data2 = json_decode(file_get_contents($pathToFile2), true);
    $diffTree = generateDiffTree($data1, $data2);

    return \Gendiff\Formaters\Stylish\stylish($diffTree);
}

/* def generate_diff_tree(data1, data2):
    keys = sorted(list(data1.keys() | data2.keys()))
    tree = []
    for key in keys:
        node = {}
        node["key"] = key
        if key not in data1:
            node["value1"] = data2[key]
            node["action"] = "added"
        elif key not in data2:
            node["value1"] = data1[key]
            node["action"] = "removed"
        else:
            if isinstance(data1[key], dict) and isinstance(data2[key], dict):
                node["action"] = "nested"
                node["children"] = generate_diff_tree(
                    data1[key], data2[key])
            elif data1[key] == data2[key]:
                node["action"] = "same"
                node["value1"] = data1[key]
            else:
                node["action"] = "changed"
                node["value1"] = data1[key]
                node["value2"] = data2[key]
        tree.append(node)
    return tree


def generate_diff(path_to_file1, path_to_file2, format='stylish'):
    data1 = get_data(path_to_file1)
    data2 = get_data(path_to_file2)
    diff_tree = generate_diff_tree(data1, data2)
    return apply_format(diff_tree, format) */
