<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        if (session()->has('email'))
        {
            return view('admin.home',['title'=>'Home']);
        }
        return view("admin.login",['title'=>'Login']);
       // return view('admin.home',['title'=>'Home']);
    }
}
