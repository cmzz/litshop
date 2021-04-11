<?php

use Foundation\Jobs\LogAsyncJob;
use Illuminate\Foundation\Bus\PendingClosureDispatch;
use Illuminate\Foundation\Bus\PendingDispatch;
use JetBrains\PhpStorm\Pure;

if (!function_exists('isValidityArrayField')) {
    /**
     * 检查数组的某一个元素是否是一个有效的数组
     *
     * @param $item
     * @param $key
     * @return bool
     */
    function isValidityArrayField($item, $key): bool {
        return isArrayField($item, $key) && count($item[$key]) > 0 || false;
    }
}

if (!function_exists('isArrayField')) {
    /**
     * 检查数组的某一个元素是否是数组
     *
     * @param $item
     * @param $key
     * @return bool
     */
    function isArrayField($item, $key): bool {
        return isset($item) && is_array($item) && isset($item[$key]) && is_array($item[$key]);
    }
}

if (!function_exists('recursionSortArray')) {
    /**
     * 根据自条件递归的对多维数组进行排序
     *
     * @param array $items
     * @param $by
     * @param $getSub
     * @param $updateSub
     */
    function recursionSortArray(array &$items, callable $by, callable $getSub, callable $updateSub)
    {
        if (is_array($items) && count($items) > 0) {
            $items = collect($items)->sortBy($by)->all();

            foreach ($items as &$item) {
                if (is_callable($getSub)) {
                    $subItems = $getSub($item);

                    if (is_array($subItems) && count($subItems) > 0) {
                        recursionSortArray($subItems, $by, $getSub, $updateSub);

                        if (is_callable($updateSub)) {
                            $updateSub($item, $subItems);
                        }
                    }
                }
            }
        }
    }
}

if (!function_exists('pathToLeafBy')) {
    /**
     * 查找满足条件的叶子节点并记录从顶层到该叶子节点经过的路径
     *
     * @param array $items
     * @param array $foundItems
     * @param callable $getSub
     * @param callable $condition
     * @param int $l
     * @param false $break
     */
    function pathToLeafBy(array &$items, array &$foundItems, callable $getSub, callable $condition, $l = 0, &$break = false)
    {
        if (is_array($items) && count($items)) {
            foreach ($items as &$item) {
                if ($break === true) {
                    break;
                }

                if ($l === 0) {
                    $foundItems = [];
                    $break = false;
                }

                if ($subItems = $getSub($item)) {
                    $foundItems[] = $item;
                    pathToLeafBy($subItems, $foundItems, $getSub, $condition, $l + 1, $break);
                } else if ($condition($item)) {
                    $foundItems[] = $item;
                    $break = true;
                    break;
                }
            }
        }
    }
}

if (!function_exists('createLinkToLeafBy')) {
    /**
     * 为数组的顶层节点添加指向到满足条件叶子节点的链接
     *  如果没有满足条件的叶子节点则取第一个
     *
     * @param array $items
     * @param callable $getSub
     * @param callable $condition
     * @param callable $updateLeaf
     * @param null $leafItem
     * @param array $parents
     * @param int $l
     */
    function createLinkToLeafBy(array &$items, callable $getSub, callable $condition, callable $updateLeaf, &$leafItem = null, &$parents = [], $l = 0): void
    {
        if (is_array($items) && count($items) > 0) {
            foreach ($items as &$item) {
                if ($l === 0) {
                    $parents = [];
                    $leafItem = null;
                }

                if (is_callable($getSub)) {
                    $subItems = $getSub($item);
                    if (is_array($subItems) && count($subItems) > 0) {
                        $parents[] = &$item;
                        createLinkToLeafBy($subItems, $getSub, $condition, $updateLeaf, $leafItem, $parents, $l + 1);
                        if (!$leafItem) {
                            $leafItem = $subItems[0];
                        }
                    } else if ($condition($item)) {
                        $leafItem = $item;
                    }
                }

                if ($l === 0 && count($parents)) {
                    foreach ($parents as &$parent) {
                        $updateLeaf($parent, $leafItem);
                    }
                }
            }
        }
    }
}

if (! function_exists('logAsync')) {
    /**
     * 异步记录日志
     *
     * @param string $message
     * @param array $context
     * @return PendingClosureDispatch|PendingDispatch
     */
    function logAsync(string $message, array $context = []): PendingDispatch|PendingClosureDispatch
    {
        return dispatch(new LogAsyncJob($message, $context, request()->server()));
    }
}

if (! function_exists('formatDuration')) {
    /**
     * 格式化时间
     *
     * @param float $seconds
     * @return string
     */
    function formatDuration(float $seconds): string
    {
        return match ($seconds) {
            $seconds < 0.001 => round($seconds * 1000000).'μs',
            $seconds < 1 => round($seconds * 1000, 2).'ms',
            default => round($seconds, 2).'s',
        };
    }
}
