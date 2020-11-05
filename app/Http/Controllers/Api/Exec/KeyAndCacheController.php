<?php

namespace App\Http\Controllers\Api\Exec;
use Artisan;

use App\Http\Controllers\Controller;

class KeyAndCacheController extends Controller
{
    public function index()
    {
        Artisan::call('key:generate');
        Artisan::call('config:cache');
    }
}