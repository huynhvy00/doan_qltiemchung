<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.list',['title' => 'Categories'],compact('categories'));

    }

    public function create()
    {
        return view('admin.categories.create',['title' => 'Create Categories']);
    }

    public function store(Request $request){
        $category = new Category();
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');

            if ($request->hasFile('banner')) {
               $file = $request->file('banner');
               $extention = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extention;
                $file->move(public_path('upload/categories'), $newImageName);
                $category->banner = $newImageName;
            }
            $category->save();
            return redirect()->back()->with('success', 'Category has been created successfully');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }

    }

    public function show(Category $category){
        return view('admin/categories/edit',['title'=>'Edit category', 'category'=> $category]);
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        try {
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');

            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extension;
                $file->move(public_path('upload/categories'), $newImageName);
                $category->banner = $newImageName;
            }
            $category->save();
            return redirect('admin/categories/list')->with('success', 'Category has been updated successfully');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->back()->with('success', 'Category has been deleted');
    }
}
