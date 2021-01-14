<?php


namespace LitShop\Core\Navigation;


use Illuminate\Support\Collection;

class Nav
{
    protected array $items = [];

    // 当前页面的叶子菜单
    protected $activeLeafItem = null;

    // 包含从顶层才到到叶子菜单的全部层级路径
    public Collection $path;

    public function __construct()
    {
        $this->path = collect([]);
    }

    public function create($conf)
    {
        $item = $this->buildItem($conf);
        $this->add($item);

        return $item;
    }

    public function path()
    {
        return $this->path;
    }

    public function inPath($id): bool
    {
        return $this->path->has($id);
    }

    # 格式化
    private function findLatestForParentItem(&$items = [], $l = 0, &$parents = [], &$leaf = null)
    {
        /** @var NavItem $item */
        foreach ($items as &$item) {
            if ($l === 0) {
                $parents = [];
                $leaf = null;
            }

            $childre = $item->children();
            if (count($childre) > 0) {
                $parents[] = $item;
                $this->findLatestForParentItem($childre, $l + 1, $parents, $leaf);

                if (!$leaf) {
                    $leaf = array_shift($childre);
                }
            } else {
                if ($item->isDefault()) {
                    $leaf = $item;
                }
            }

            if ($l === 0 && $parents) {
                foreach ($parents as &$parent) {
                    $parent->leaf($leaf);
                }
            }
        }

        return $items;
    }

    public function add(NavItem $item = null, NavItem $parent = null): Nav
    {
        if ($parent) {
            /** @var NavItem $v */
            foreach ($this->items as &$v) {
                if ($parent->name() === $v->name()) {
                    $v->children($item);
                    return $this;
                }
            }
        }

        $this->items[] = $item;
        return $this;
    }

    public function sort()
    {
        $this->items = $this->sortItems($this->items);
        $this->items = $this->findLatestForParentItem($this->items);
        $this->findCurrentLeafItem($this->items);
        return $this;
    }

    public function current()
    {
        return $this->activeLeafItem;
    }

    private function findCurrentLeafItem(array &$items, array &$parents = [], $l = 0)
    {
        if ($items) {
            /** @var NavItem $item */
            foreach ($items as &$item) {
                if ($l === 0) {
                    $parents = [];
                }

                if ($children = $item->children()) {
                    $parents[] = $item;
                    $this->findCurrentLeafItem($children, $parents, $l + 1);
                } else {
                    if ($item->activeStatus()) {
                        $this->activeLeafItem = $item;
                        $parents[] = $item;

                        if ($parents) {
                            foreach ($parents as $parent) {
                                $this->path->add($parent->id());
                            }

                            $parents = [];
                            break;
                        }
                    }
                }
            }
        }

        return $items;
    }

    private function sortItems(array $items) {
        if (is_array($items) && $items) {
            $items = collect($items)->sortBy(function ($v) {
                return $v->order();
            })->all();

            /** @var NavItem $item */
            foreach ($items as &$item) {
                $children = $item->children();
                if (is_array($children) && $children) {
                    $childItems = $this->sortItems($children);
                    $item->replaceChildren($childItems);
                }
            }
        }

        return $items;
    }

    public function items()
    {
        return $this->items;
    }

    public function setGroup($group = null)
    {
        return $this;
    }

    public function buildFromConfig(array $config = null)
    {
        if ($config) {
            foreach ($config as $v) {
                $item = $this->buildItem($v);
                $this->add($item);
            }
        }

        return $this;
    }

    private function buildItem(array $conf, $level = 0): NavItem
    {
        $item = new NavItem();
        $item->name(data_get($conf, 'name'));
        $item->icon(data_get($conf, 'icon', ''));
        $item->order(data_get($conf, 'order', 0));
        $item->isDefault(data_get($conf, 'isDefault', false));
        $item->active(data_get($conf, 'active', ''));
        $item->section(data_get($conf, 'section', 'default'));
        $item->view(data_get($conf, 'view', ''));
        $item->level($level);

        if ($r = data_get($conf, 'route')) {
            $item->route(data_get($r, '0'), data_get($r, '1'));
        } elseif ($url = data_get($conf, 'url')) {
            $item->url($url);
        }

        if ($children = data_get($conf, 'children')) {
            foreach ($children as $child) {
                $childItem = $this->buildItem($child, $level + 1);
                $item->children([$childItem]);
            }
        }

        return $item;
    }

    /**
     * 返回有权限访问的菜单
     */
    public function authorizeItems()
    {

    }
}
