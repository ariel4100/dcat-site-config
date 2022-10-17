<?php

namespace Dcat\Admin\Forms;

use Dcat\Admin\Support;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Str;

class SiteConfigForm extends Form
{
    public function handle(array $input)
    {
        $data = array();
        foreach($input as $key=>$val) {
            $t =  Str::of($key)->replace('_', '.');
            $data[(string)$t] = $val;
        }

        admin_setting($data);

        return $this
            ->response()
            ->location(admin_url('site-settings'))
            ->success(Support::trans('main.updated_success'));
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->text('admin_powered', Support::trans('main.powered_by'))
            ->default(config('admin.powered'));

        $this->text('admin_name', Support::trans('main.name'))
            ->default(config('admin.name'));

        $this->text('admin_title', Support::trans('main.title'))
            ->default(config('admin.title'));

        $this->switch('admin_layout_horizontal-menu', Support::trans('main.top_menu'))->default(config('admin.layout.horizontal-menu'));
        $this->switch('admin_allow-register', Support::trans('main.allow_register'))->default(config('admin.allow-register'));
        $this->switch('admin_allow-reset-password', Support::trans('main.allow_reset_password'))->default(config('admin.allow-reset-password'));

        $this->switch('admin_recaptch-enabled', Support::trans('main.recaptch_enabled'))->default(config('admin.recaptch-enabled'));
        $this->text('admin_recaptch-site', Support::trans('main.recaptch_site'))->default(config('admin.recaptch-site'));
        $this->text('admin_recaptch-secret', Support::trans('main.recaptch_secret'))->default(config('admin.recaptch-secret'));

        $this->radio('admin_layout_sidebar-style', Support::trans('main.menu_style'))
            ->options(['light' => 'Light', 'dark' => 'Dark'])
            ->default(config('admin.layout.sidebar-style'));

        $this->radio('admin_login-layout', Support::trans('main.login_layout'))
            ->options(['primary' => 'Primary', 'left' => 'Left Aligned'])
            ->default(config('admin.login-layout'));

        $this->radio('admin_layout_color', Support::trans('main.base_color'))
            ->options(['default' => 'Default', 'blue' => 'Blue', 'blue-light' => 'Light Blue', 'green' => 'Green', 'black' => 'Black', 'yellow', 'Yellow'])
            ->default(config('admin.layout.color'));

        $this->radio('admin_layout_navbar-color', Support::trans('main.nav_bar_color'))
            ->options(['' =>'Default', 'bg-primary' => 'Primary', 'bg-info' => 'Blue', 'bg-warning' => 'Orange', 'bg-success' => 'Green', 'bg-dark' => 'Dark'])
            ->default(config('admin.layout.navbar-color'));

        $this->image('admin_logo-image', Support::trans('main.logo'))
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo-image'));

        $this->image('admin_logo-mini', Support::trans('main.logo_mini'))
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo-mini'));

        $this->image('admin_login-image', Support::trans('main.login_image'))
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.login-image'));

        $this->number('admin_paginate-default', Support::trans('main.paginate_default'))->default(config('admin.paginate-default'));
        // $this->radio('app_locale', Support::trans('main.lang'))
        //     ->options(['en' =>'English', 'ru' => 'Russian'])
        //     ->default(config('app.locale'));

    }
}