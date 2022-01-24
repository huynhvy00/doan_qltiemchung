<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\PhieuDangKyTiem;
use Illuminate\Http\Request;

class PhieuDangKyTiemController extends Controller
{
    public function index(){
        $phieudk = PhieuDangKyTiem::latest()->paginate(5);
        return view('admin.treem.list',['title' => 'Danh sách trẻ em', 'phieudk'=>$phieudk,
        'doituong'=>$this->getDoiTuong(),
        'phuhuynh'=>$this->getPhuHuynh()]);

    }
    public function show(PhieuDangKyTiem $phieudk){
    //      $kv = $this->getKhuVuc();
    //    dd($kv);
        return view('admin.treem.edit',[
            'title'=>'Cập nhật thông tin trẻ em',
            'treen'=>$this->getTreEm(),
            'nhanvien'=>$this->getPhuHuynh(),
            'phieudk'=>$phieudk]);
    }
    public function detail(PhieuDangKyTiem $phieudk){
        return view('admin.treem.detail',[
            'title'=> 'Chi tiết hồ sơ trẻ em',
            'phieudk'=>$phieudk,
            'doituong'=>$this->getDoiTuong(),
            'phuhuynh'=>$this->getPhuHuynh()

        ]);
    }
    public function create()
    {
        return view('admin.treem.create',['title' => 'Thêm mới hồ sơ trẻ',
        'doituong'=>$this->getDoiTuong(),
        'phuhuynh'=>$this->getPhuHuynh()]);
    }

    public function store(Request $request){
        // dd($request);
        $te = new TreEm();
        $request->validate([
            'tenTre' => 'required',
            'id_PH' => 'required',
            'id_DT' => 'required',
            'ngaySinh' => 'required',
            'gioiTinh' => 'required',
            'code' => 'required',
        ]);

        try {
            $te->tenTre = $request->input('tenTre');
            $te->id_PH = $request->input('id_PH');
            $te->id_DT = $request->input('id_DT');
            $te->ngaySinh = $request->input('ngaySinh');
            $te->gioiTinh = $request->input('gioiTinh');
            $te->code = $request->input('code');

            $te->save();
            return redirect('treem/list')->with('success', 'Tạo mới hồ sơ trẻ em thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }

    }
    public function update(Request $request, TreEm $treem){
        // dd($request);
        $request->validate([
            'tenTre' => 'required',
            'id_PH' => 'required',
            'id_DT' => 'required',
            'ngaySinh' => 'required',
            'gioiTinh' => 'required',
            'code' => 'required',
        ]);
        try {
            $treem->tenTre = $request->input('tenTre');
            $treem->id_PH = $request->input('id_PH');
            $treem->id_DT = $request->input('id_DT');
            $treem->ngaySinh = $request->input('ngaySinh');
            $treem->gioiTinh = $request->input('gioiTinh');
            $treem->code = $request->input('code');

            $treem->save();
            return redirect('treem/list')->with('success', 'Cập nhật hồ sơ trẻ em thành công !');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
    public function getDoiTuong(){
        return doiTuong::all();
    }
    public function getPhuHuynh(){
        return User::all();
    }
}
