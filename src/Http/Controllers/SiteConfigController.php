<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Forms\SiteConfigForm;
use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class SiteConfigController extends Controller
{
     public function index(Content $content): Content
     {
         return $content->header('Site Configuration')
             ->description('Site configuration')
             ->body(new SiteConfigForm());
     }
}