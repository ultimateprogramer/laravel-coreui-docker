<?php

namespace App\Http\Controllers\Api\Exec;
use Artisan;

use App\Http\Controllers\Controller;

class DBMigrateController extends Controller
{
    public function index()
    {
        Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));
    }
}