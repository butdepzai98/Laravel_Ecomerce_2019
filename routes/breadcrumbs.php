<?php
Breadcrumbs::register('home', function ($breadcrumbs) {
        $breadcrumbs->push('Home', route('home'));
});
    Breadcrumbs::register('productType', function ($breadcrumbs, $param) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push($param, route('producttype',$param));
    });
        Breadcrumbs::register('product', function ($breadcrumbs, $param, $product) {
            $breadcrumbs->parent('home',$param);
            $breadcrumbs->push($product, route('product',['name'=>$param]));
        });
   
    Breadcrumbs::register('about', function ($breadcrumbs, $continent) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push($continent, route('about'));
    });
   
    Breadcrumbs::register('contact', function ($breadcrumbs, $continent) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push($continent, route('contact'));
    });

    Breadcrumbs::register('checkout', function ($breadcrumbs, $continent) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push($continent);
    });
   