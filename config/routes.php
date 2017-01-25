<?php

return array(
 //товар
    'product/([0-9]+)'=>'product/view/$1',//actionView in ProductController
//каталог
    'catalog'=>'catalog/index',//actionIndex in CatalogController
//категории
    'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',//actionCategory in CatalogController
    'category/([0-9]+)'=>'catalog/category/$1',//actionCategory in CatalogController
//корзина
    'cart/delete/([0-9]+)'=>'cart/delete/$1',//actionDelete in CartController
    'cart/add/([0-9]+)'=>'cart/add/$1',//actionAdd in CartController
    'cart/checkout'=>'cart/checkout',//actionCheckout in CartController
    'cart/addAjax/([0-9]+)'=>'cart/addAjax/$1',//actionAdd in CartController
    'cart'=>'cart/index',//actionIndex in CartController
//пользователь
    'user/login'=>'user/login',//actionLogin in UserController
    'user/logout'=>'user/logout',//actionLogout in UserController
    'user/register'=>'user/register',//actionRegister in UserController
    'user/edit'=>'cabinet/edit',//actionEdit in CabinetController
    'cabinet/edit'=>'cabinet/edit',//actionEdit in CabinetController
    'cabinet'=>'cabinet/index',//actionIndex in CabinetController
//управление товарами
    'admin/product/create'=>'adminProduct/create',
    'admin/product/update/([0-9]+)'=>'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)'=>'adminProduct/delete/$1',
    'admin/product'=>'adminProduct/index',
//управление категориями
    'admin/category/create'=>'adminCategory/create',
    'admin/category/update/([0-9]+)'=>'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)'=>'adminCategory/delete/$1',
    'admin/category'=>'adminCategory/index',
//управление заказами
    'admin/order/update'=>'adminOrder/update',
    'admin/order/delete/([0-9]+)'=>'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)'=>'adminOrder/view/$1',
    'admin/order'=>'adminOrder/index',
//админпанель
    'admin'=>'admin/index',//actionIndex in AdminController
    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',
//главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    ''=>'site/index',//actionIndex in SiteController

);