<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class test extends Controller
{
    public function test() {

        $res = File::exists(public_path('public/images/products/'));
        
        dd($res);
    }
}
