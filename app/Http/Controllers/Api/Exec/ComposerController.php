<?php

namespace App\Http\Controllers\Api\Exec;

use App\Http\Controllers\Controller;

class ComposerController extends Controller
{
    public function index()
    {
        $path = base_path();
        system("cd {$path} && composer install && composer update laravel/framework");
    }
}
