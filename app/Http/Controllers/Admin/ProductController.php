<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderByDesc('id')->paginate(10);
        return view('admin.products.list',[
            'title'=>'Products list',
        ],compact('products'));
    }

    public function detail(Product $product){
        return view('admin.products.detail',[
            'title'=> 'Detail',
            'product'=>$product
        ]);
    }

    public function create(){
        return view('admin.products.create',['title'=>'Create Product',
            'categories'=>$this->getCategory(),]);

    }

    public function store(Request $request){
        $product = new Product();
        $request->validate([
           'name'=>'required',
           'slug'=>'required|unique:products',
            'category_id' => 'required',
            'quantity'=>'required|integer|min:0',
            'price' => 'required|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;

            if ($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'.'.$request->name.'.'.$extension;
                $file->move(public_path('upload/products'),$newImageName);
                $product->image = $newImageName;
            }
            $product->save();
            return redirect()->back()->with('success','Product has been created successfully');
        }catch (Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }

    public function show(Product $product){
        return view('admin.products.edit',[
            'title'=>'Edit product',
            'categories'=>$this->getCategory(),
            'product'=>$product
        ]);
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'category_id' => 'required',
            'quantity'=>'required|integer|min:0',
            'price' => 'required|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;

            if ($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'.'.$request->name.'.'.$extension;
                $file->move(public_path('upload/products'),$newImageName);
                $product->image = $newImageName;
            }
            $product->save();
            return redirect()->back()->with('success','Product has been created successfully');
        }catch (Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }

    public function getCategory(){
        return Category::all();
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success','Product has been deleted');
    }
}
