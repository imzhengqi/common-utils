<?php

namespace zhengqi\common\utils;

/**
 * 数组处理工具类
 */
class ArrayUtils extends AbstractUtils
{

    /**
     * 将扁平数组转换为树形结构
     *
     * @param array $array 扁平数组
     * @param string $idKey 主键字段名（默认 'id'）
     * @param string $parentKey 父级字段名（默认 'parent_id'）
     * @param string $childrenKey 子节点字段名（默认 'children'）
     * @return array 树形结构
     */
    public static function buildTree(
        array  $array,
        string $idKey = 'id',
        string $parentKey = 'parent_id',
        string $childrenKey = 'children'
    ): array
    {
        $tree = [];
        $map = [];

        // 将所有节点存储到映射表中
        foreach ($array as $item) {
            $map[$item[$idKey]] = $item;
            $map[$item[$idKey]][$childrenKey] = []; // 初始化子节点
        }

        // 构建树形结构
        foreach ($map as $id => &$node) {
            if (isset($node[$parentKey])) {
                $parentId = $node[$parentKey];
                if (isset($map[$parentId])) {
                    $map[$parentId][$childrenKey][] = &$node;
                }
            } else {
                $tree[] = &$node; // 根节点
            }
        }

        return $tree;
    }

    /**
     * 将树形结构转换为扁平数组
     *
     * @param array $tree 树形结构
     * @param string $childrenKey 子节点字段名（默认 'children'）
     * @return array 扁平数组
     */
    public static function flattenTree(array $tree, string $childrenKey = 'children'): array
    {
        $result = [];
        $stack = $tree;

        while (!empty($stack)) {
            $node = array_shift($stack);
            $children = $node[$childrenKey] ?? [];
            unset($node[$childrenKey]); // 移除子节点字段
            $result[] = $node;

            // 将子节点压入栈中
            if (!empty($children)) {
                array_unshift($stack, ...$children);
            }
        }

        return $result;
    }

}