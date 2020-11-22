<?php

namespace App\Http\Controllers\Vue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    //
    public function index(){
        return view('vue.app');
    }
}
