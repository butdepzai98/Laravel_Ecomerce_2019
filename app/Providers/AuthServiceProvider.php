<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\Category;
use App\Policies\CategoryPolicy;
use App\Models\Product;
use App\Policies\ProductsPolicy;
use App\Models\ProductType;
use App\Policies\ProductTypePolicy;
use App\Models\Order;
use App\Policies\OrderPolicy;
use App\Models\OrderDetail;
use App\Policies\OrderDetailPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',

        Category::class => CategoryPolicy::class,
        Product::class => ProductsPolicy::class,
        ProductType::class => ProductTypePolicy::class,
        Order::class => OrderPolicy::class,
        OrderDetail::class => OrderDetailPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
