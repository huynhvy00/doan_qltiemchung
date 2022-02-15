<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\UserService;
use App\Models\khuVuc;
use App\Models\LoaiNhanVien;
use App\Models\User;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $nhanvien = User::latest()->paginate(10);
        return view('admin.nhanvien.list', [
            'title' => 'Danh sách nhân viên',
            'nhanvien' => $nhanvien,
            'nhanvienyte' => $this->userService->getUser(1),
            'nhanvientrungtam' => $this->userService->getUser(2),

            'khuvuc' => $this->getKhuVuc()
        ]);
    }
    public function getActive($user){
        // dd($user);
        return view('admin.nhanvien.list',['title'=>'Vô hiệu hoá tài khoản nhân viên',
        'nhanvienyte'=>$user,
        'nhanvientrungtam'=>$user,

    ]);
    }
    public function postActive($user){
        $this->userService->active($user);
        return redirect()->back();
    }

    public function show(User $nhanvien)
    {
        //      $kv = $this->getKhuVuc();
        //    dd($kv);
        return view('admin.nhanvien.edit', [
            'title' => 'Cập nhật thông tin nhân viên',
            'khuvuc' => $this->getKhuVuc(),
            'nhanvien' => $nhanvien
        ]);
    }
    public function create()
    {
        return view('admin.nhanvien.create', [
            'title' => 'Thêm mới nhân viên',
            'khuvuc' => $this->getKhuVuc(),
            'loainhanvien' => $this->getLoaiNhanVien(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $nv = new User();
        $request->validate([
            'tenNV' => 'required',
            'idLoaiNV' => 'required',
            'email' => 'required',
            'password' => 'required',
            'sdt' => 'required',
            'diaChi' => 'required',
            'CMND' => 'required',
            'ngaySinh' => 'required',
            'code' => 'required',
            'gioiTinh' => 'required',
            // 'tinhTrang' => 'required',

            'anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $nv->tenNV = $request->input('tenNV');
            $nv->email = $request->input('email');
            $nv->password = $request->input('password');
            $nv->sdt = $request->input('sdt');
            $nv->diaChi = $request->input('diaChi');
            $nv->CMND = $request->input('CMND');
            $nv->ngaySinh = $request->input('ngaySinh');
            $nv->code = $request->input('code');
            $nv->idLoaiNV = $request->input('idLoaiNV');
            // $nv->tinhTrang = $request->input('tinhTrang');
            $nv->gioiTinh = $request->input('gioiTinh');


            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $extention = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . $request->input('name') . '.' . $extention;
                $file->move(public_path('images/phuhuynh'), $newImageName);
                $nv->anh = $newImageName;
            }
            $nv->save();
            return redirect('nhanvien/list')->with('success', 'Tạo mới hồ sơ nhân viênh thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function detail(User $nhanvien)
    {
        return view('admin.nhanvien.detail', [
            'title' => 'Chi tiết thông tin hồ sơ nhân viên',
            'nhanvien' => $nhanvien,
            'loainhanvien' => $this->getLoaiNhanVien(),
            'khuvuc'=>$this->getKhuVuc(),
        ]);
    }
    public function update(Request $request, User $nhanvien)
    {
        // dd($request);
        $request->validate([
            // 'tenPH' => 'required',
            'email' => 'required',
            'password' => 'required',
            'sdt' => 'required',
            'diaChi' => 'required',
            // 'CMND' => 'required',
            'ngaySinh' => 'required',
            'code' => 'required',
            // 'gioiTinh' => 'required',
        ]);
        try {
            // $nhanvien->tenPH = $request->input('tenPH');
            $nhanvien->email = $request->input('email');
            $nhanvien->password = $request->input('password');
            $nhanvien->sdt = $request->input('sdt');
            $nhanvien->diaChi = $request->input('diaChi');
            // $nhanvien->CMND = $request->input('CMND');
            // $nhanvien->ngaySinh = $request->input('ngaySinh');
            $nhanvien->code = $request->input('code');
            // $nhanvien->gioiTinh = $request->input('gioiTinh');

            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time() . '-' . $request->input('name') . '.' . $extension;
                $file->move(public_path('images/phuhuynh'), $newImageName);
                $nhanvien->anh = $newImageName;
            }
            $nhanvien->save();
            return redirect('nhanvien/list')->with('success', 'Thông tin nhân viên cập nhật thành công !');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }
    public function getKhuVuc()
    {
        return khuVuc::all();
    }
    public function getLoaiNhanVien()
    {
        return LoaiNhanVien::all();
    }
}
