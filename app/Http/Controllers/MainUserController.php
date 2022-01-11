<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainUserController extends Controller
{
    public function index(){
        $product = Product::orderByDesc('id')->paginate(5);
        return view('main',['products'=>$product]);
    }
}
