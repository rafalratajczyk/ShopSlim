<?php

namespace ShopSlim\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use ShopSlim\Models\Product;
use Slim\Views\Twig;

class HomeController
{
    public function index(Request $request, Response $response, Twig $view, Product $product)
    {
        $products = $product->get();

        var_dump($products->first()->title);
        die();

        return $view->render($response, 'home.twig');
    }
}