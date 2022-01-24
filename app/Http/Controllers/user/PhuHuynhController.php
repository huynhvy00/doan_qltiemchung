<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PhuHuynh;
use App\Models\khuVuc;
// use App\Models\PhuHuynh;
use Illuminate\Http\Request;

use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class PhuHuynhController extends Controller
{
    public function index(){
        $phuhuynh = PhuHuynh::latest()->paginate(5);
        return view('admin.phuhuynh.list',['title' => 'Danh sách phụ huynh', 'phuhuynh'=>$phuhuynh,
        'khuvuc'=>$this->getKhuVuc()]);

    }
    public function show(PhuHuynh $phuhuynh){
    //      $kv = $this->getKhuVuc();
    //    dd($kv);
        return view('admin.phuhuynh.edit',[
            'title'=>'Edit phu huynh',
        'khuvuc'=>$this->getKhuVuc(),
            'phuhuynh'=>$phuhuynh] );
    }
    public function create()
    {
        return view('admin.phuhuynh.create',['title' => 'Create Categories',
        'khuvuc'=>$this->getKhuVuc(),]);
    }

    public function store(Request $request){
        // dd($request);
        $ph = new PhuHuynh();
        $request->validate([
            'tenPH' => 'required',
            'email' => 'required',
            'password' => 'required',
            'sdt' => 'required',
            'diaChi' => 'required',
            'CMND' => 'required',
            'ngaySinh' => 'required',
            'code' => 'required',
            'gioiTinh' => 'required',

            'anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $ph->tenPH = $request->input('tenPH');
            $ph->email = $request->input('email');
            $ph->password = $request->input('password');
            $ph->sdt = $request->input('sdt');
            $ph->diaChi = $request->input('diaChi');
            $ph->CMND = $request->input('CMND');
            $ph->ngaySinh = $request->input('ngaySinh');
            $ph->code = $request->input('code');
            $ph->gioiTinh = $request->input('gioiTinh');


            if ($request->hasFile('anh')) {
               $file = $request->file('anh');
               $extention = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extention;
                $file->move(public_path('images/phuhuynh'), $newImageName);
                $ph->anh = $newImageName;
            }
            $ph->save();
            return redirect('phuhuynh/list')->with('success', 'Tạo mới hồ sơ phụ huynh thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }

    }
    public function update(Request $request, PhuHuynh $phuhuynh){
        // dd($request);
        $request->validate([
            // 'tenPH' => 'required',
            'email' => 'required',
            'password' => 'required',
            'sdt' => 'required',
            'diaChi' => 'required',
            // 'CMND' => 'required',
            // 'ngaySinh' => 'required',
            'code' => 'required',
            // 'gioiTinh' => 'required',
        ]);
        try {
            // $phuhuynh->tenPH = $request->input('tenPH');
            $phuhuynh->email = $request->input('email');
            $phuhuynh->password = $request->input('password');
            $phuhuynh->sdt = $request->input('sdt');
            $phuhuynh->diaChi = $request->input('diaChi');
            // $phuhuynh->CMND = $request->input('CMND');
            // $phuhuynh->ngaySinh = $request->input('ngaySinh');
            $phuhuynh->code = $request->input('code');
            // $phuhuynh->gioiTinh = $request->input('gioiTinh');

            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extension;
                $file->move(public_path('images/phuhuynh'), $newImageName);
                $phuhuynh->anh = $newImageName;
            }
            $phuhuynh->save();
            return redirect('phuhuynh/list')->with('success', 'Category has been updated successfully');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
    public function getKhuVuc(){
        return khuVuc::all();
    }

}
