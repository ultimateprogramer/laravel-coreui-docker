<?php

namespace App\Http\Controllers\Api\Exec;
use Artisan;

use App\Http\Controllers\Controller;

class DBSeedController extends Controller
{
    public function index()
    {
        Artisan::call('db:seed', array('--force' => true));
    }
}