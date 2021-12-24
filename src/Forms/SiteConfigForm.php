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
            $t =  Str::of($key)->replace('_', '.');
            $data[(string)$t] = $val;
        }

        admin_setting($data);
        return $this
            ->response()
            ->success('Site configuration successfully updated!')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->text('admin_powered')
            ->default(config('admin.powered'));

        $this->text('admin_name')
            ->default(config('admin.name'));

        $this->text('admin_title')
            ->default(config('admin.title'));

        $this->image('admin_logo-image', 'Logo')
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo-image'));

        $this->image('admin_logo-mini', 'Logo Mini')
            ->autoUpload()
            ->uniqueName()
            ->default(config('admin.logo-mini'));

        $this->switch('admin_layout_horizontal-menu', 'Top Menu')->default(config('admin.layout.horizontal-menu'));
    }
}