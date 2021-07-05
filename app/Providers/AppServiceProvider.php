<?php

namespace App\Providers;
use App\Helper\CartHelper;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\OptionsModel;
use App\Models\OrderModel;
use App\Models\ProductsModel;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('data', OptionsModel::find(1));
            $view->with('banner', BannerModel::all());
            $view->with(['cart' => new CartHelper()]);

        });
        view()->composer('dashboard', function ($view) {
            $view->with('post', ProductsModel::all());
            $view->with('cate', CategoryModel::all());
            $view->with('user', User::all());
            $view->with('order', OrderModel::all());

        });
        Paginator::useBootstrap();

    }
}
