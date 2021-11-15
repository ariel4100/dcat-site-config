<?php

namespace Dcat\Admin;

use Dcat\Admin\Http\Middleware\AfterInjectDcatPlus;
use Dcat\Admin\Http\Middleware\BeforeInjectDcatPlus;
use Dcat\Admin\Http\Middleware\MiddleInjectDcatPlus;
use Dcat\Admin\Extend\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package Celaraze\DcatPlus
 */
class SiteConfigServiceProvider extends BaseServiceProvider
{
    protected $middleware = [
        'before' => [
            BeforeInjectDcatPlus::class,
        ],
        'middle' => [
            MiddleInjectDcatPlus::class,
        ],
        'after' => [
            AfterInjectDcatPlus::class,
        ]
    ];

    protected $menu = [
        [
            'title' => 'Site Config',
            'uri' => '/site-settings',
            'icon' => 'feather icon-settings'
        ]
    ];

    public function register()
    {
        //
    }

    public function settingForm()
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();

    }
}
