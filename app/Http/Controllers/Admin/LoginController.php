<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Sentinel;
class LoginController extends Controller
{

    public function index(){
        if (session()->has('email'))
        {
            return redirect('admin');
        }
        return view("admin.login",['title'=>'Login']);
    }

    public function store(Request $request){
       // dd($request->input());
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ], $request->input('remember'))){
           $request->session()->put('email',$request->input('email'));
            return redirect()->route('admin');
        }

        Session::flash('error','Email of Password incorrect!');
        return redirect()->back();

    }

    public function create(){
        return view("admin.register",['title'=>'Register']);
    }

    public function register(){
        request()->validate([
            'name'      =>  'required',
            'password'  =>  'required',
            'email'     =>  'required'
        ]);

        User::create([
            'name' => request('name'),
            'password' => Hash::make(request('password')),
            'email' => request('email'),
        ]);
        return redirect('admin/login');

    }

    public function logout(){
        if (session()->has('email')){
            session()->pull('email');
            //session()->forget('email');
        }
        return redirect('admin/login');


    }


}
