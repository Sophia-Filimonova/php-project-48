<?php

namespace Gendiff\Cli;

function parseArguments()
{
  $doc = <<<DOC
  Generate diff

Usage:
  gendiff (-h|--help)
  gendiff (-v|--version)
  gendiff [--format <fmt>] <firstFile> <secondFile>

Options:
  -h --help                     Show this screen
  -v --version                  Show version
  --format <fmt>                Report format [default: stylish]
DOC;
  $args = \Docopt::handle($doc, array('version'=>'1.0'));
  print_r($args);
//   foreach ($args as $k=>$v)
//    echo $k.': '.$v.PHP_EOL;
}