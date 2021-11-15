<?php

use Dcat\Admin\Http\Controllers\SiteConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/site-settings', [SiteConfigController::class, 'index']);