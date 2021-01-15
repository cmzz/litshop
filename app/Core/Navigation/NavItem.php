<?php

namespace LitShop\Core\Navigation;

use Illuminate\Support\Str;
use Nav;
use LitShop\Core\Support\Traits\FluentlyGetsAndSets;

class NavItem
{
    use FluentlyGetsAndSets;

    protected int $id = 0;
    protected string $name = '';
    protected string $section = '';
    protected string $url = '';
    protected int $order = 0;
    protected string $icon = '';
    protected array $children = [];
    protected string $authorization;
    protected string $active = '';
    protected string $view = '';
    protected string $route = '';
    protected bool $isDefault = false;
    protected bool $isActive = false;
    protected array $routeParams = [];

    // 层级
    protected int $level = 0;

    // 叶子菜单元素 (isDefault | the first element)
    protected NavItem $leaf;

    // parent menu
    protected ?NavItem $parent = null;

    public function __construct()
    {
        try {
            $this->id = random_int(1, 99999999);
        } catch (\Exception $e) {
            $this->id = microtime();
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function level($level = null)
    {
        return $this->getOrSet('level')->value($level);
    }

    public function name($name = null)
    {
        return $this->getOrSet('name')->value($name);
    }

    public function order($order = null)
    {
        return $this->getOrSet('order')->value($order);
    }

    public function section($section = null)
    {
        return $this->getOrSet('section')->value($section);
    }

    public function route(string $name, $params = [])
    {
        if ($name) {
            $this->getOrSet('route')->value($name);
            if ($params) {
                $this->getOrSet('routeParams')->value($params);
            }

            $url = route($name, $params);
        }

        return $this->url($url);
    }

    public function url($url = null)
    {
        return $this->getOrSet('url')->value($url);
    }

    public function urlOrLeafUrl($url = null)
    {
        if (count($this->children) && $this->leaf) {
            return $this->leaf->url();
        }

        return $this->url();
    }

    public function icon($icon = null)
    {
        return $this->getOrSet('icon')->value($icon);
    }

    public function replaceChildren(array $value): self
    {
        $this->children = $value;
        return $this;
    }

    public function children($items = null)
    {
        if (is_null($items)) {
            return $this->children;
        }

        if (is_array($items)) {
            $this->children = collect($items)->map(function ($value) {
                if ($value instanceof NavItem) {
                    $value->parent = &$this;
                    return $value;
                } else {
                    $item = Nav::create($value);
                    $item->parent = &$this;
                    $item->level = $this->level + 1;
                    return $item;
                }
            })->merge($this->children)->values()->all();
        }

        return $this;
    }

    public function can($ability = null, $arguments = [])
    {
        return true;
    }

    public function active($pattern = null)
    {
        return $this->getOrSet('active')->value($pattern);
    }

    public function view(string $view = null)
    {
        return $this->getOrSet('view')->value($view);
    }

    public function isDefault(bool $isDefault = false)
    {
        return $this->getOrSet('isDefault')->value($isDefault);
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function activeStatus()
    {
        $status = false;

        if ($this->route) {
            $r = request();
            if ($r->routeIs($this->route)) {
                if ($this->routeParams) {
                    if ($queries = $r->query()) {
                        $allInQuery = true;
                        foreach ($this->routeParams as $k => $v) {
                            if (!isset($queries[$k]) || $queries[$k] !== $v) {
                                $allInQuery = false;
                                break;
                            }
                        }

                        if ($allInQuery) {
                            $status = true;
                        }
                    }
                } else {
                    $status = true;
                }
            }
        } else {
            $status = preg_match('#'.$this->active.'#', (request())->decodedPath()) === 1;
        }

        $this->isActive = $status;
        return $this->isActive;
    }

    public function parent($parent = null)
    {
        return $this->getOrSet('parent')->value($parent);
    }

    public function leaf($leaf = null)
    {
        return $this->getOrSet('leaf')->value($leaf);
    }

    public function isLeaf($leaf = null): bool
    {
        if ($this->parent) {
            return false;
        }

        return true;
    }

    public function hasChildren(): bool
    {
        if (count($this->children) > 0) {
            return true;
        }

        return false;
    }
}
