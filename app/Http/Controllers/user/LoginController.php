<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){

        return view('modal-login',['title' => 'Đăng nhập hệ thống']);
  
     }
  
     public function store(Request $request){
  
        $this->validate($request,[
            'CMND'=>'required',
            'password'=>'required'
        ]);
  
        if (Auth::attempt([
            'CMND'=>$request->input('CMND'),
            'password'=>$request->input('password')
        ], $request->input('remember'))){
           return redirect()-> route('index');
        }
  
        Session::flash('error','CMND or Password incorrect');
        return redirect()->back();
         //dd($request->input());
  
     }
  }