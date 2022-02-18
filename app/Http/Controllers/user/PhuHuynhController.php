<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Service\PhieuTiemService;
use App\Models\PhuHuynh;
use App\Http\Service\PhuHuynhService;
use App\Models\Benh;
use App\Models\ChiTietMuiTiem;
use App\Models\doiTuong;
use App\Models\khuVuc;
use App\Models\TreEm;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class PhuHuynhController extends Controller
{
    public function __construct(PhuHuynhService $phuhuynhService, PhieuTiemService $phieutiemService)
    {
        $this->phuhuynhService = $phuhuynhService;
        $this->phieutiemService = $phieutiemService;
    }
    public function index(){
        $phuhuynh = PhuHuynh::latest()->paginate(10);
        return view('admin.phuhuynh.list',[
        'title' => 'Danh sách phụ huynh',
        'phuhuynh'=>$phuhuynh,
        'haichau' => $this->phuhuynhService->getPhuHuynh('HC    '),
        'camle' => $this->phuhuynhService->getPhuHuynh('CL'),
        'nguhanhson' => $this->phuhuynhService->getPhuHuynh('NHS'),
        'sontra' => $this->phuhuynhService->getPhuHuynh('ST'),
        'lienchieu' => $this->phuhuynhService->getPhuHuynh('LC'),
        'khuvuc'=>$this->getKhuVuc()]);
    }
    public function getActive($phuhuynh){
        // dd($phuhuynh);
        return view('admin.phuhuynh.list',['title'=>'Vô hiệu hoá tài khoản phụ huynh',
        'haichau'=>$phuhuynh,
        'camle'=>$phuhuynh,
        'nguhanhson'=>$phuhuynh,
        'sontra'=>$phuhuynh,
        'lienchieu'=>$phuhuynh,
    ]);
    }
    public function postActive($phuhuynh){
        $this->phuhuynhService->active($phuhuynh);
        return redirect()->back();
    }

    public function show(PhuHuynh $phuhuynh){
    //    dd($kv);
        return view('admin.phuhuynh.edit',[
            'title'=>'Edit phu huynh',
        'khuvuc'=>$this->getKhuVuc(),
            'phuhuynh'=>$phuhuynh] );
    }
    public function create()
    {
        return view('admin.phuhuynh.create',['title' => 'Thêm tài khoản phụ huynh',
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
            $ph->password = Hash::make($request->input('password')) ;
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
            return redirect('admin/phuhuynh/list')->with('success', 'Tạo mới hồ sơ phụ huynh thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }
    }
    public function detail(PhuHuynh $phuhuynh)
    {
        return view('admin.phuhuynh.detail', [
            'title' => 'Chi tiết thông tin hồ sơ phụ huynh',
            'phuhuynh' => $phuhuynh,
            'doituong' => $this->getDoiTuong(),
            'treem' => $this->getTreEm(),
            'khuvuc'=>$this->getKhuVuc(),
        ]);
    }
    public function update(Request $request, PhuHuynh $phuhuynh){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'sdt' => 'required',
            'diaChi' => 'required',
            'code' => 'required',
        ]);
        try {
            $phuhuynh->email = $request->input('email');
            $phuhuynh->password = Hash::make($request->input('password')) ;
            $phuhuynh->sdt = $request->input('sdt');
            $phuhuynh->diaChi = $request->input('diaChi');
            $phuhuynh->code = $request->input('code');

            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extension;
                $file->move(public_path('images/phuhuynh'), $newImageName);
                $phuhuynh->anh = $newImageName;
            }
            $phuhuynh->save();
            return redirect('admin/phuhuynh/list')->with('success', 'Category has been updated successfully');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
    // đang ky tiem
    // public function createPhieuDK(Request $request){
    //     $this->phuhuynhService->getAllDangKy($request);
    //     return redirect()->back();
    // }
    public function createPhieuDK()
    {
       // dd("hearrrr");
        // $vaccine = $this->getVaccine();
// dd($vaccine);
        return view('dang-ky-tiem', [
            'title' => 'Lập phiếu đăng ký theo yêu cầu',
            'vaccine' => $this->getVaccine(),
            'treem' => $this->getTreEm(),
            'benh' => $this->getBenh(),
            'phuhuynh' => $this->getPhuHuynh(),
            'khuvuc' => $this->getKhuVuc(),
            'nhanvien' => $this->getUser()
        ]);
    }
    public function storePhieuDK(Request $request){
      //  dd('ffff');
       // $this->chitietService->createChiTiet($request);


        $this->phieutiemService->create($request);
        return redirect()->back();
    }
    // public function logout(){
    //     if (session()->has('phuhuynh')){
    //         session()->pull('phuhuynh');
    //         session()->pull('tenPH');
    //     }
    //     return redirect('index');
    // }
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
