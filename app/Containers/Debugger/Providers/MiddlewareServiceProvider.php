<?php

namespace App\Containers\Debugger\Providers;

use App\Containers\Debugger\Middlewares\RequestsMonitorMiddleware;
use App\Containers\Debugger\Traits\DebuggerTrait;
use App\Ship\Parents\Providers\MiddlewareProvider;

/**
 * Class MiddlewareServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MiddlewareServiceProvider extends MiddlewareProvider
{
    use DebuggerTrait;

    protected $middleware = [

    ];

    protected $middlewareGroups = [
        'web' => [

        ],
        'api' => [
            // Hello API Requests Monitor
            RequestsMonitorMiddleware::class,
        ],
    ];

    protected $routeMiddleware = [

    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadContainersInternalMiddlewares();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        $this->runQueryDebugger(true, true);
    }
}
