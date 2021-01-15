<?php


namespace LitShop\Core\Navigation;


use Illuminate\Support\Collection;

class Nav
{
    protected array $items = [];

    // 当前页面的叶子菜单
    protected ?NavItem $activeLeafItem = null;
    protected ?NavItem $activeTopItem = null;

    // 包含从顶层才到到叶子菜单的全部层级路径
    public Collection $path;

    public function __construct()
    {
        $this->path = collect([]);
    }

    public function create($conf): NavItem
    {
        $item = $this->buildItem($conf);
        $this->add($item);

        return $item;
    }

    public function path(): Collection
    {
        return $this->path;
    }

    public function inPath($id): bool
    {
        return $this->path->has($id);
    }

    public function add(NavItem $item = null, NavItem $parent = null): self
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

    public function sort(): self
    {
        recursionSortArray($this->items,
            static fn ($item) => $item->order(),
            static fn ($item) => $item->children(),
            static fn (&$item, $sub) => $item->replaceChildren($sub)
        );

        return $this;
    }

    public function format(): self
    {
        createLinkToLeafBy(
            $this->items,
            static fn (NavItem &$item) => $item->children(),
            static fn (NavItem &$item) => $item->isDefault(),
            static fn (NavItem &$item, NavItem &$leaf) => $item->leaf($leaf)
        );

        $activeMenus = [];
        pathToLeafBy(
            $this->items,
            $activeMenus,
            static fn(&$item) => $item->children(),
            static fn(&$item) => $item->activeStatus(),
            0
        );

        if ($len = count($activeMenus)) {
            foreach ($activeMenus as $i => $menu) {
                if ($i === 0) {
                    $this->activeTopItem = $menu;
                }

                if($i === $len - 1) {
                    $this->activeLeafItem = $menu;
                }

                $this->path->add($menu->id());
            }
        }

        return $this;
    }

    public function activeLeafMenu(): NavItem
    {
        return $this->activeLeafItem;
    }

    public function activeTopMenu(): NavItem
    {
        return $this->activeTopItem;
    }

    public function items(): array
    {
        return $this->items;
    }

    public function setGroup($group = null): self
    {
        return $this;
    }

    /**
     * 从配置文件创建菜单
     *
     * @param array|null $config
     * @return $this
     */
    public function buildFromConfig(array $config = null): self
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
    public function authorizeItems(): array
    {
        return $this->items();
    }
}
