<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Alumno;

class Index2Controller extends Controller
{
    public function index2alumno(){
        return view('web.principal');
    }
}
