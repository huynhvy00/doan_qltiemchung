<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Http\Service\ChiTietMuiTiemService;
use App\Http\Service\PhieuTiemService;
use App\Models\Benh;
use App\Models\ChiTietMuiTiem;
use App\Models\doiTuong;
use App\Models\khuVuc;
use App\Models\LichSuTiem;
use App\Models\PhieuDangKyTiem;
use App\Models\PhuHuynh;
use App\Models\TreEm;
use App\Models\User;
use App\Models\Vaccine;
use Exception;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

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
            'lichsu' => $this->getLichSu(),

            'chitiet' => $chitiet
        ]);
    }


    public function update(Request $request, ChiTietMuiTiem $chitiet)
    {
        $chitietTiem = ChiTietMuiTiem::select(
            'chi_tiet_mui_tiems.*',
            'phieu_dang_ky_tiems.id_Tre',
         )
         ->join('phieu_dang_ky_tiems', 'phieu_dang_ky_tiems.id', '=', 'chi_tiet_mui_tiems.id_PhieuDK')
         ->where('chi_tiet_mui_tiems.id', $chitiet->id)
         ->First();

        //  dd($chitietTiem);
        $request->validate([
            // 'id_Tre' => 'required',
            // 'id_NV' => 'required',
            // 'id_VX' => 'required',
            // 'id_PhieuTiem' => 'required',
            // 'ngayTiem' => 'required',
            'bieuHienTruoc' => 'required',
            'bieuHienSau' => 'required',
            'chieuCao' => 'required',
            'canNang' => 'required',
            'nhipTim' => 'required',
            'nhietDo' => 'required',
        ]);
        $a = $chitietTiem->ngayTiem;
        $b = $chitietTiem->id_VX;
        $c = $chitietTiem->id_Tre;
        $d = $chitietTiem->id_PhieuDK;

        $lichsu = new LichSuTiem();

        try {
            $lichsu->id_Tre = $c;
            $lichsu->id_VX = $b;
            $lichsu->id_NV = Auth::user()->id;
            $lichsu->id_PhieuTiem = $d;
            $lichsu->ngayTiem = $a;

            $lichsu->bieuHienTruoc = $request->input('bieuHienTruoc');
            $lichsu->bieuHienSau = $request->input('bieuHienSau');
            $lichsu->chieuCao = $request->input('chieuCao');
            $lichsu->canNang = $request->input('canNang');
            $lichsu->nhipTim = $request->input('nhipTim');
            $lichsu->nhietDo = $request->input('nhietDo');
            $lichsu->save();

            $chitiet->tinhTrang = 1;
            $chitiet->id_NV = Auth::user()->id;
            $chitiet->save();
            return redirect('admin/phieutiem/chitietmuitiem/list')->with('success', 'Xác nhận đã kiểm tra !');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function showKT(ChiTietMuiTiem $chitiet)
    {

        return view('admin.phieutiem.chitietmuitiem.detailKTra', [
            'title' => 'Nhập chỉ số phiếu tiêm',
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser(),
            'doituong' => $this->getDoiTuong(),
            'phieudk' => $this->getPhieuDK(),
            'benh' => $this->getBenh(),
            'lichsu' => $this->getLichSu(),

            'chitiet' => $chitiet
        ]);
    }
    public function updateKT(Request $request, ChiTietMuiTiem $chitiet)
    {
        $request->validate([]);
        try {

            $chitiet->tinhTrang = 2;
            $chitiet->id_NV = Auth::user()->id;
            $chitiet->save();
            return redirect('admin/phieutiem/chitietmuitiem/list')->with('success', 'Xác nhận đã thực hiện tiêm !');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function showDT(ChiTietMuiTiem $chitiet)
    {

        return view('admin.phieutiem.chitietmuitiem.detailDT', [
            'title' => 'Nhập chỉ số phiếu tiêm',
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser(),
            'doituong' => $this->getDoiTuong(),
            'phieudk' => $this->getPhieuDK(),
            'benh' => $this->getBenh(),
            'lichsu' => $this->getLichSu(),

            'chitiet' => $chitiet
        ]);
    }
    public function updateDT(Request $request, ChiTietMuiTiem $chitiet)
    {
        $request->validate([]);
        try {


            $chitiet->save();
            return redirect('admin/phieutiem/chitietmuitiem/list');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function detail(ChiTietMuiTiem $chitiet)
    {
        // dd($chitiet);
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
    public function getLichSu()
    {
        return LichSuTiem::all();
    }
}
