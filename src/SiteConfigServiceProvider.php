<?php

namespace Dcat\Admin;

use Dcat\Admin\Extend\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package Celaraze\DcatPlus
 */
class SiteConfigServiceProvider extends BaseServiceProvider
{
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
