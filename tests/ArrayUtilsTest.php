<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\ArrayUtils;

class ArrayUtilsTest extends TestCase
{
    public function testBuildTree()
    {
        $array = [
            ['id' => 1, 'parent_id' => 0],
            ['id' => 2, 'parent_id' => 1],
            ['id' => 3, 'parent_id' => 1],
        ];
        $tree = ArrayUtils::buildTree($array);
        $this->assertIsArray($tree);
    }

    public function testFlattenTree()
    {
        $tree = [
            ['id' => 1, 'parent_id' => 0, 'children' => [
                ['id' => 2, 'parent_id' => 1],
                ['id' => 3, 'parent_id' => 1],
            ]]
        ];
        $flatArray = ArrayUtils::flattenTree($tree);
        $this->assertIsArray($flatArray);
    }

    public function testFlattenTree2()
    {
        $tree = [
            ['id' => 1, 'parent_id' => 0, 'children' => [
                ['id' => 2, 'parent_id' => 1],
                ['id' => 3, 'parent_id' => 1],
            ]]
        ];
        $flatArray = ArrayUtils::flattenTree2($tree);
        $this->assertIsArray($flatArray);
    }
}