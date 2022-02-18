<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\ChiTietMuiTiemService;
use App\Models\khuVuc;
use App\Models\User;
use Mockery\Exception;
use App\Http\Service\PhieuTiemService;
use App\Models\Benh;
use App\Models\ChiTietMuiTiem;
use App\Models\doiTuong;
use Illuminate\Support\Facades\Session;
use App\Models\PhieuDangKyTiem;
use App\Models\PhuHuynh;
use App\Models\TreEm;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\XacNhanPhieuTiemEmail;


class PhieuDangKyTiemController extends Controller
{
    protected $phieutiemService;

    public function __construct(PhieuTiemService $phieutiemService, ChiTietMuiTiemService $chitietService)
    {
        $this->chitietService = $chitietService;
        $this->phieutiemService = $phieutiemService;
    }


    public function index()
    {

        $phieudk = PhieuDangKyTiem::latest()->where('del', 1)->orderBy('ngayDKTiem', 'DESC')->paginate(10);
        return view('admin.phieutiem.list', [
            'title' => 'Danh sách phiếu đăng ký tiêm ',
            'phieudk' => $phieudk,
            'a1' => $this->phieutiemService->getPhieuDK(0),
            'a2' => $this->phieutiemService->getPhieuDK(1),
            'nhanvien' => $this->getUser(),
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreem(),
        ]);
    }
    public function show(PhieuDangKyTiem $phieudk)
    {
        //      $kv = $this->getKhuVuc();
        //    dd($kv);
        return view('admin.phieutiem.detail', [
            'title' => 'Xác nhận phiếu đăng ký tiêm',
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser(),
            'doituong' => $this->getDoiTuong(),
            'chitietmuitiem' => $this->getChiTietMuiTiem(),
            'benh' => $this->getBenh(),
            'phieudk' => $phieudk
        ]);
    }
    public function update(Request $request, PhieuDangKyTiem $phieudk)
    {

        $phuhuynh = PhuHuynh::select(
            'phu_huynhs.*',
            'tre_ems.id_PH',
            'tre_ems.code',
            'tre_ems.tenTre',
        )
            ->join('tre_ems', 'tre_ems.id_PH', '=', 'phu_huynhs.CMND')
            ->join('phieu_dang_ky_tiems', 'phieu_dang_ky_tiems.id_Tre', '=', 'tre_ems.code')

            // ->where('phu_huynhs.CMND', session('phuhuynh'))
            ->get();
        return $phuhuynh;

        $a = 1;
        $request->validate([]);
        try {

            $phieudk->tinhTrang = $a;
            $phieudk->id_NV = Auth::user()->id;
            $phieudk->save();
            $this->sendMail($request->input('email'), $request->input('name'), $request->input('code'));
            return redirect('admin/phieutiem/list')->with('success', 'Xác nhận phiếu đăng ký tiêm thành công !');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function sendMail($email, $name, $code)
    {
        $data = [
            'name' => $name,
            'code' => $code,
        ];
        Mail::to($email)->send(new XacNhanPhieuTiemEmail($data));
    }
    public function detail(PhieuDangKyTiem $phieudk)
    {
        // dd($phieudk);
        return view('admin.phieutiem.detail', [
            'title' => 'Chi tiết phiếu đăng ký',
            'phieudk' => $phieudk,
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'doituong' => $this->getDoiTuong(),
            'benh' => $this->getBenh(),
            'chitietmuitiem' => $this->getChiTietMuiTiem(),
            'treem' => $this->getTreEm(),
            'nhanvien' => $this->getUser()

        ]);
    }
    public function create()
    {
        // dd("hearrrr");
        // $vaccine = $this->getVaccine();
        // dd($vaccine);
        return view('admin.phieutiem.create', [
            'title' => 'Lập phiếu đăng ký theo yêu cầu',
            'vaccine' => $this->getVaccine(),
            'treem' => $this->getTreEm(),
            'benh' => $this->getBenh(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'nhanvien' => $this->getUser()
        ]);
    }
    public function store(Request $request)
    {
        //  dd('ffff');
        // $this->chitietService->createChiTiet($request);


        $this->phieutiemService->create($request);
        return redirect('admin/phieutiem/list');
    }


    public function postHidden(Request $request, PhieuDangKyTiem $phieudk)
    {
        $this->phieutiemService->updateHidden($request, $phieudk);
        return redirect('admin/phieutiem/list')->with('success', 'Xoá phiếu đăng ký thành công !');
    }

    public function createDK()
    {
        // dd("hearrrr");
        // $vaccine = $this->getVaccine();
        // dd($vaccine);
        //  $tre =$this->phieutiemService->getTreByPH();
        //  dd($tre);
        return view('dang-ky-tiem', [
            'title' => 'Lập phiếu đăng ký cho con',
            'vaccine' => $this->getVaccine(),
            'treem' => $this->getTreEm(),
            'benh' => $this->getBenh(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'nhanvien' => $this->getUser(),
            'tre' => $this->phieutiemService->getTreByPH(),
        ]);
    }
    public function storeDK(Request $request)
    {
        //  dd('ffff');
        // $this->chitietService->createChiTiet($request);


        $this->phieutiemService->create($request);
        return redirect('chi-tiet-dang-ky');
    }

    public function chitietDangKy(PhieuDangKyTiem $phieudk)
    {
        // dd($phieudk);
        return view('chi-tiet-dang-ky', [
            'title' => 'Chi tiết phiếu đăng ký',
            'phieudk' => $phieudk,
            'vaccine' => $this->getVaccine(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'doituong' => $this->getDoiTuong(),
            'benh' => $this->getBenh(),
            'chitietmuitiem' => $this->getChiTietMuiTiem(),
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
    }
    public function getBenh()
    {
        return Benh::all();
    }
}
