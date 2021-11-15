<?php

namespace Dcat\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Str;

class SiteConfigForm extends Form
{
    public function handle(array $input)
    {
        $data = array();
        foreach($input as $key=>$val) {
            $t =  Str::of($key)->replaceFirst('_', '.');
            $data[(string)$t] = $val;
        }

        admin_setting($data);
        return $this
            ->response()
            ->success('Site configuration update successfully!')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->text('admin_powered')
            ->default(config('admin.powered'));

        $this->text('admin_title')
            ->default(config('admin.title'));

        $this->image('admin_logo', 'Logo')
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo'));

        $this->image('admin_logo-mini', 'Logo Mini')
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo-mini'));
    }
}