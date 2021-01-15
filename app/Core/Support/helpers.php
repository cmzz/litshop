<?php


/**
 * 根据自定的条件递归的对多维数组进行排序
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
