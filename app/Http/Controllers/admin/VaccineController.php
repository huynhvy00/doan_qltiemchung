<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\doiTuong;
use App\Models\Benh;
use App\Models\LoSX;
// use App\Models\NhanVien;
use App\Models\Vaccine;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index(){
        $vaccine = Vaccine::latest()->paginate(5);
        return view('admin.vaccine.list',['title' => 'Danh sách vaccine', 'vaccine'=>$vaccine,
        'benh'=>$this->getBenh(),
        'doituong'=>$this->getDoiTuong(),
        'losx'=>$this->getLoSX()]);

    }
    public function detail(Vaccine $vaccine){
        return view('admin.vaccine.detail',[
            'title'=> 'Chi tiet vaccine',
            'vaccine'=>$vaccine,
            'benh'=>$this->getBenh(),
            'doituong'=>$this->getDoiTuong(),
            'losx'=>$this->getLoSX()
        ]);
    }


    public function create()
    {
        return view('admin.vaccine.create',['title' => 'them moi vacine',
        'benh'=>$this->getBenh(),
        'doituong'=>$this->getDoiTuong(),
        'losx'=>$this->getLoSX()]);
    }

    public function store(Request $request){
        // dd($request);
        $vx = new Vaccine();
        $request->validate([
            'tenVX' => 'required',
            'code' => 'required',
            'code_lo' => 'required',
            'id_DoiTuong' => 'required',
            'ngaySX' => 'required',
            'hanSD' => 'required',
            'soLuong' => 'required',
            'donGia' => 'required',
            'ghiChu' => 'required',
            // 'ngayNhap' => 'required',

            'anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $vx->tenVX = $request->input('tenVX');
            $vx->code = $request->input('code');
            $vx->code_lo = $request->input('code_lo');
            $vx->id_DoiTuong = $request->input('id_DoiTuong');
            $vx->ngaySX = $request->input('ngaySX');
            $vx->hanSD = $request->input('hanSD');
            $vx->soLuong = $request->input('soLuong');
            $vx->donGia = $request->input('donGia');
            $vx->ghiChu = $request->input('ghiChu');


            if ($request->hasFile('anh')) {
               $file = $request->file('anh');
               $extention = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extention;
                $file->move(public_path('images/vx'), $newImageName);
                $vx->anh = $newImageName;
            }
            $vx->save();
            return redirect('vaccine/list')->with('success', 'Thêm mới vaccin thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
      }

    }
    public function show(Vaccine $vaccine){
        //      $kv = $this->getKhuVuc();
        //    dd($kv);
            return view('admin.vaccine.edit',[
                'title'=>'Cap nhat vaccine',
            'benh'=>$this->getBenh(),
        'doituong'=>$this->getDoiTuong(),
        'losx'=>$this->getLoSX(),
                'vaccine'=>$vaccine] );
        }
    public function update(Request $request, Vaccine $vaccine){
        // dd($request);
        $request->validate([
            'tenVX' => 'required',
            'id_DoiTuong' => 'required',
            'code' => 'required',
            'code_lo' => 'required',
            'ngaySX' => 'required',
            'hanSD' => 'required',
            'soLuong' => 'required',
            'donGia' => 'required',
            'ghiChu' => 'required',
            'tinhTrang' => 'required',
        ]);
        try {
            $vaccine->tenVX = $request->input('tenVX');
            $vaccine->id_DoiTuong = $request->input('id_DoiTuong');
            $vaccine->code = $request->input('code');
            $vaccine->code_lo = $request->input('code_lo');
            $vaccine->ngaySX = $request->input('ngaySX');
            $vaccine->hanSD = $request->input('hanSD');
            $vaccine->soLuong = $request->input('soLuong');
            $vaccine->ghiChu = $request->input('ghiChu');
            $vaccine->donGia = $request->input('donGia');
            $vaccine->tinhTrang = $request->input('tinhTrang');

            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $extension = $file->getClientOriginalExtension();
                $newImageName = time().'-'.$request->input('name').'.'.$extension;
                $file->move(public_path('images/vx'), $newImageName);
                $vaccine->anh = $newImageName;
            }
            $vaccine->save();
            return redirect('vaccine/list')->with('success', 'Cập nhật thông tin vaccine thành công');
        }catch(Exception $err){
            Session::flash('error',$err->getMessage());
            return redirect()->back();
        }
    }
    public function getLoSX(){
        return LoSX::all();
    }
    public function getDoiTuong(){
        return doiTuong::all();
    }
    public function getBenh(){
        return Benh::all();
    }

}
