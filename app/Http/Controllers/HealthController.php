<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function hello() {
        $var1 = ["teste1", "teste2", "teste3"];
        return print_r($var1);
        //return phpinfo();
    }
}
