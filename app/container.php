<?php

use Slim\Views\Twig;
use ShopSlim\Models\Product;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;
use function DI\get;
use Slim\Interfaces\RouterInterface;

return [
    RouterInterface::class => function (ContainerInterface $container) { return $container->get('router'); },
    Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__ . '/../resources/views', [
            'cache' => false
        ]);

        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));

        return $twig;
    },

    Product::class => function (ContainerInterface $c) {
        return new Product;
    }
];