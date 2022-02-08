<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\khuVuc;
use App\Models\User;
use Mockery\Exception;
use App\Http\Service\PhieuTiemService;
use App\Models\ChiTietMuiTiem;
use Illuminate\Support\Facades\Session;
use App\Models\PhieuDangKyTiem;
use App\Models\PhuHuynh;
use App\Models\TreEm;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class PhieuDangKyTiemController extends Controller
{
    protected $phieutiemService;

    public function __construct(PhieuTiemService $phieutiemService)
    {
        $this->phieutiemService = $phieutiemService;
    }

    public function index(){

        $phieudk = PhieuDangKyTiem::latest()->paginate(5);
        return view('admin.phieutiem.list',['title' => 'Danh sách phiếu đăng ký tiêm ',
        'phieudk'=>$phieudk,
        'a1'=> $this->phieutiemService->getPhieuDK(0),
        'a2'=> $this->phieutiemService->getPhieuDK(1),
        'nhanvien'=>$this->getUser(),
        'vaccine'=>$this->getVaccine(),
        'phuhuynh'=>$this->getPhuHuynh(),
        'khuvuc'=>$this->getKhuVuc(),
        'treem'=>$this->getTreem()]);

    }
    public function show(PhieuDangKyTiem $phieudk){
    //      $kv = $this->getKhuVuc();
    //    dd($kv);
        return view('admin.phieutiem.edit',[
            'title'=>'Xác nhận phiếu đăng ký tiêm',
        'vaccine'=>$this->getVaccine(),
        'phuhuynh'=>$this->getPhuHuynh(),
        'khuvuc'=>$this->getKhuVuc(),
        'treem'=>$this->getTreEm(),
            'nhanvien'=>$this->getUser(),
            'phieudk'=>$phieudk]);
    }
    public function detail(PhieuDangKyTiem $phieudk){
        return view('admin.treem.detail',[
            'title'=> 'Chi tiết phiếu đăng ký',
            'phieudk'=>$phieudk,
        'vaccine'=>$this->getVaccine(),
        'phuhuynh'=>$this->getPhuHuynh(),
        'khuvuc'=>$this->getKhuVuc(),
        'chitietmuitiem'=>$this->getChiTietMuiTiem(),
        'treem'=>$this->getTreEm(),
            'nhanvien'=>$this->getUser()

        ]);
    }
    public function create()
    {
        return view('admin.phieudk.create',['title' => 'Lập phiếu đăng ký theo yêu cầu',
        'vaccine'=>$this->getVaccine(),
        'treem'=>$this->getTreEm(),
        'phuhuynh'=>$this->getPhuHuynh(),
        'khuvuc'=>$this->getKhuVuc(),
        'nhanvien'=>$this->getUser()]);
    }

    public function store(Request $request){
        // dd($request);
        $dk = new PhieuDangKyTiem();
        $request->validate([
            'id_Tre' => 'required',
            'id_NV' => 'required',
            'ngayDKTiem' => 'required',
            'tongTien' => 'required',
            'tinhTrang' => 'required',
            'soMui' => 'required',
        ]);

        try {
            $dk->id_Tre = $request->input('id_Tre');
            $dk->id_NV = $request->input('id_NV');
            $dk->ngayDKTiem = $request->input('ngayDKTiem');
            $dk->tongTien = $request->input('tongTien');
            $dk->soMui = $request->input('soMui');
            $dk->tinhTrang = $request->input('tinhTrang');

            $dk->save();
            return redirect('phieutiem/list')->with('success', 'Tạo phiếu đăng ký tiêm thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }

    }
    public function update(Request $request, PhieuDangKyTiem $dangky){
        // dd($request);
        $request->validate([
            // 'id_Tre' => 'required',
            // 'id_NV' => 'required',
            'ngayDKTiem' => 'required',
            // 'tongTien' => 'required',
            'tinhTrang' => 'required',
            // 'soMui' => 'required',
        ]);
        try {
            // $dangky->id_Tre = $request->input('id_Tre');
            // $dangky->id_NV = $request->input('id_NV');
            $dangky->ngayDKTiem = $request->input('ngayDKTiem');
            // $dangky->tongTien = $request->input('tongTien');
            $dangky->tinhTrang = $request->input('tinhTrang');
            // $dangky->soMui = $request->input('soMui');

            $dangky->save();
            return redirect('phieudangky/list')->with('success', 'Cập nhật phiếu đăng ký tiêm thành công !');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
    public function getTreEm(){
        return TreEm::all();
    }
    public function getUser(){
        return User::all();
    } public function getVaccine(){
        return Vaccine::all();
    } public function getPhuHuynh(){
        return PhuHuynh::all();
    } public function getKhuVuc(){
        return khuVuc::all();
    } public function getChiTietMuiTiem(){
    return ChiTietMuiTiem::all();
}

}
