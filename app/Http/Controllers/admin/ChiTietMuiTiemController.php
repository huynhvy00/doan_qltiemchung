<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Http\Service\ChiTietMuiTiemService;
use App\Http\Service\PhieuTiemService;
use App\Models\Benh;
use App\Models\ChiTietMuiTiem;
use App\Models\doiTuong;
use App\Models\khuVuc;
use App\Models\PhieuDangKyTiem;
use App\Models\PhuHuynh;
use App\Models\TreEm;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ChiTietMuiTiemController extends Controller
{
    public function __construct(PhieuTiemService $phieutiemService, ChiTietMuiTiemService $chitietService)
    {
        $this->chitietService = $chitietService;
        $this->phieutiemService = $phieutiemService;
    }


    public function index()
    {
// dd('dsd');
        $chitiet = ChiTietMuiTiem::latest()->orderBy('ngayTiem','DESC')->paginate(10);

        return view('admin.phieutiem.chitietmuitiem.list', [
            'title' => 'Danh sách mũi tiêm cần thực hiện ',
            'chitiet' => $chitiet,
            'chuakiemtra' => $this->chitietService->getChiTiet(0,1),
            'dakiemtra' => $this->chitietService->getChiTiet(1,1),
            'datiem' => $this->chitietService->getChiTiet(2,1),
            'nhanvien' => $this->getUser(),
            'vaccine' => $this->getVaccine(),
            'phieudk' => $this->getPhieuDK(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreem()
        ]);
    }
    public function show(ChiTietMuiTiem $chitiet)
    {
        //      $kv = $this->getKhuVuc();
       // dd($chitiet);
        //    dd($kv);
        // $vaccine = $this->getVaccine();
        // dd($vaccine);
        return view('admin.phieutiem.chitietmuitiem.detail', [
            'title' => 'Nhập chỉ số phiếu tiêm',
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser(),
            'doituong' => $this->getDoiTuong(),
            'phieudk' => $this->getPhieuDK(),
            'benh' => $this->getBenh(),

            'chitiet' => $chitiet
        ]);
    }
    public function detail(ChiTietMuiTiem $chitiet)
    {
        dd($chitiet);
        return view('admin.phieutiem.detail', [
            'title' => 'Chi tiết phiếu đăng ký',
            'chitiet' => $chitiet,
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'doituong' => $this->getDoiTuong(),
            'benh' => $this->getBenh(),
            'phieudk' => $this->getPhieuDK(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser()

        ]);
    }
    public function getTreEm()
    {
        return TreEm::all();
    }
    public function getUser()
    {
        return User::all();
    }
    public function getVaccine()
    {
        return Vaccine::all();
    }
    public function getPhuHuynh()
    {
        return PhuHuynh::all();
    }
    public function getKhuVuc()
    {
        return khuVuc::all();
    }
    public function getChiTietMuiTiem()
    {
        return ChiTietMuiTiem::all();
    }
    public function getDoiTuong()
    {
        return doiTuong::all();
    }  public function getPhieuDK()
    {
        return PhieuDangKyTiem::all();
    }
    public function getBenh()
    {
        return Benh::all();
    }
}
