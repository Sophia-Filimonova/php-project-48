<?php

namespace Gendiff\Tests\DifferTest;

use PHPUnit\Framework\TestCase;
use function Gendiff\Differ\genDiff;

class DifferTest extends TestCase
{
    /**
     * @param string $fixtureName
     * @return string
     */
    private function getFixtureFullPath($fixtureName)
    {
        return __DIR__ . "/fixtures/" . $fixtureName;
    }

    public function testGenDiff()
    {
        $fixture1 = $this->getFixtureFullPath('file1_plain.json');
        $fixture2 = $this->getFixtureFullPath('file2_plain.json');
        $diffResult = file_get_contents($this->getFixtureFullPath('result.txt'));
        $this->assertEquals(genDiff($fixture1, $fixture2), $diffResult);
    }


    // /**
    //  * @dataProvider mainProvider
    //  * @param string $file1
    //  * @param string $file2
    //  * @param string $expectedResult
    //  * @param string $format
    //  * @return void
    //  */
    // public function testTwoGendiffs($file1, $file2, $format, $expectedResult)
    // {
    //     $fixture1 = $this->getFixtureFullPath($file1);
    //     $fixture2 = $this->getFixtureFullPath($file2);
    //     $diffResult = file_get_contents($this->getFixtureFullPath($expectedResult));
    //     $this->assertEquals(genDiff($fixture1, $fixture2, $format), $diffResult);
    // }

    // /**
    //  * @return array<int, array<int, string>>
    //  */
    // public function mainProvider()
    // {
    //     return [
    //         [
    //             'file1.json',
    //             'file2.json',
    //             'stylish',
    //             'resultStylish.txt'
    //         ],
    //         [
    //             'file1.yml',
    //             'file2.yml',
    //             'stylish',
    //             'resultStylish.txt'
    //         ],
    //         [
    //             'file1.json',
    //             'file2.json',
    //             'plain',
    //             'resultPlain.txt'
    //         ],
    //         [
    //             'file1.yml',
    //             'file2.yml',
    //             'plain',
    //             'resultPlain.txt'
    //         ],
    //         [
    //             'file1.json',
    //             'file2.json',
    //             'json',
    //             'resultJson.txt'
    //         ],
    //         [
    //             'file1.yml',
    //             'file2.yml',
    //             'json',
    //             'resultJson.txt'
    //         ],
    //     ];
    // }
}