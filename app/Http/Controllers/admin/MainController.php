<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

            return view('admin.main',['title'=>'Home']);

       // return view('admin.home',['title'=>'Home']);
    }
}
