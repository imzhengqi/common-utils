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
        int $parentId = 0,
        string $idKey = 'id',
        string $parentKey = 'parent_id',
        string $childrenKey = 'children'
    ): array
    {
        $branch = [];
        foreach ($array as $item) {
            if ($item[$parentKey] == $parentId) {
                $children = self::buildTree($array, $item[$idKey]);
                if ($children) {
                    $item[$childrenKey] = $children;
                }
                $branch[] = $item;
            }
        }
        return $branch;
    }

    /**
     * 将树形结构转换为扁平数组 - 栈
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

    /**
     * 将树形结构转换为扁平数组 - 递归
     *
     * @param array $tree
     * @param string $childrenKey
     * @return array
     */
    public static function flattenTree2(array $tree, string $childrenKey = 'children'): array
    {
        $flatArray = [];

        // 定义递归函数
        function traverse($nodes, &$flatArray, $childrenKey)
        {
            foreach ($nodes as $node) {
                // 移除 'children' 键，只保留需要的数据
                $flatNode = $node;
                unset($flatNode[$childrenKey]);

                // 将当前节点添加到扁平数组
                $flatArray[] = $flatNode;

                // 如果有子节点，递归处理
                if (isset($node[$childrenKey]) && is_array($node[$childrenKey])) {
                    traverse($node[$childrenKey], $flatArray, $childrenKey);
                }
            }
        }

        // 调用递归函数
        traverse($tree, $flatArray, $childrenKey);

        return $flatArray;
    }

}