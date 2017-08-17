<?php

$app->get('/', ['ShopSlim\Controllers\HomeController', 'index'])->setName('home');
$app->get('/products/{slug}', ['ShopSlim\Controllers\ProductController', 'get'])->setName('product.get');