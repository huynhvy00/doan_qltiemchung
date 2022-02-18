<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Benh;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class BenhController extends Controller
{
    public function index(){
        $benh = Benh::latest()->paginate(10);
        return view('admin.benh.list',['title' => 'Danh sach benh', 'benh'=>$benh]);
    }
    public function show(Benh $benh){
    //    dd($kv);
        return view('admin.benh.edit',[
            'title'=>'Cập nhật thông tin benh hoc',
            'benh'=>$benh] );
    }
    public function create()
    {
        return view('admin.benh.create',['title' => 'Thêm mới thông tin bệnh']);
    }
    public function store(Request $request){
        // dd($request);
        $benh = new Benh();
        $request->validate([
            'tenBenh' => 'required',
            'code' => 'required',
            'ghiChu' => 'required',
        ]);

        try {
            $benh->tenBenh = $request->input('tenBenh');
            $benh->code = $request->input('code');
            $benh->ghiChu = $request->input('ghiChu');

            $benh->save();
            return redirect('admin/benh/list')->with('success', 'Tạo thông tin bệnh học thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }
    }
    public function update(Request $request, Benh $benh){
        // dd($request);
        $request->validate([
            'tenBenh' => 'required',
            'code' => 'required',
            'ghiChu' => 'required',
        ]);
        try {
            $benh->tenBenh = $request->input('tenBenh');
            $benh->code = $request->input('code');
            $benh->ghiChu = $request->input('ghiChu');

            $benh->save();
            return redirect('admin/benh/list')->with('success', 'Thông tin bệnh học được cập nhật thành công !');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
}
