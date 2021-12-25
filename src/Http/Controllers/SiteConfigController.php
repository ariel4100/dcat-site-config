<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Forms\SiteConfigForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Support;
use Illuminate\Routing\Controller;

class SiteConfigController extends Controller
{
     public function index(Content $content): Content
     {
         return $content->header(Support::trans('main.site_config'))
             ->description('')
             ->body(new SiteConfigForm());
     }
}