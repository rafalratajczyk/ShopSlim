<?php

namespace ShopSlim\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use ShopSlim\Models\Product;
use Slim\Views\Twig;
use Slim\Router;

class ProductController
{
    protected $view;
    /**
     * ProductController constructor.
     */
    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function get($slug, Request $request, Response $response, Twig $view, Router $router, Product $product)
    {
        $product = $product->where('slug', $slug)->first();

        if (!$product) {
            return $response->withRedirect($router->pathFor('home'));
        }

        return $this->view->render($response, 'products/product.twig');
    }
}