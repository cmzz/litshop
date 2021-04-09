<?php

namespace Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use LitCore\Entities\Goods;
use LitCore\Module\Goods\GoodsService;
use LitCore\Repositories\Goods\GoodsInterface;
use LitCore\Repositories\Goods\GoodsRepository;
use Livewire\Component;

/**
 * @method dispatchBrowserEvent(string $string, $message)
 * @method where($field, string $string, string $string1)
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });

        // goods
        $this->app->bind(GoodsInterface::class, function ($app) {
            return new GoodsRepository(new Goods());
        });
        $this->app->bind(GoodsService::class, function ($app) {
            return new GoodsService(
                $app->make(GoodsInterface::class)
            );
        });
    }
}
