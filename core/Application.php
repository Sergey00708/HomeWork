<?php

namespace Sergey\Framework;

use Sergey\App\Controllers\HomeController;
use Sergey\App\Controllers\ShopController;
use Sergey\Framework\Exceptions\GetComponentException;
use Sergey\Framework\Interfaces\RunnableInterface;


class Application implements RunnableInterface
{

    protected $config;

    public static $instance;

    public static function getApp(array $config = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getComponent($key)
    {
        if (isset($this->config['components'][$key]['factory'])) {
                $factoryClass = $this->config['components'][$key]['factory'];
                $factory = new $factoryClass();
                $instance = $factory->createComponent();
                return $instance;
            }

        throw new GetComponentException('Components not found');
    }

    public function run()
    {
        $router = $this->getComponent('router');

        $router->addRoute('/', [HomeController::class, 'index']);
        $router->addRoute('/shop/show', [ShopController::class, 'show']);

        $action = $router->route($_SERVER['REQUEST_URI']);

        return $action();
    }
}