<?php

namespace App\Containers\Country\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Webpatser\Countries\CountriesFacade;
use Webpatser\Countries\CountriesServiceProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends MainProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $containerServiceProviders = [
        CountriesServiceProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $containerAliases = [
        'Countries' => CountriesFacade::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadContainersInternalProviders();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        $this->loadContainersInternalAliases();
    }
}
