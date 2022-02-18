<?php

namespace App\Http\Service;

use App\Models\PhieuDangKyTiem;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class PhieuTiemService
{
    public function getPhieuDK($tinhTrang)
    {

        return PhieuDangKyTiem::where('tinhTrang', $tinhTrang)->where('del', 1)->orderBy('ngayDKTiem', 'DESC')->get();
    }

    public function updateHidden($request, $phieudk)
    {
        $request->validate([]);
        $b = 0;
        try {
            $phieudk->update([
                'del' => $b,
            ]);
            Session::flash('success', 'Xoá phiếu đăng ký thành công!');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage('Xoá phiếu đăng ký không thành công'));
            return false;
        }
        return true;
    }
    public function create($request)
    {
        $request->validate([
            'id_Tre' => 'required',
            // 'id_NV' => 'required',
            'ngayDKTiem' => 'required',
            // 'tongTien' => 'required',
            // 'tinhTrang' => 'required',
            // 'soMui' => 'required',
        ]);
        $ldate = date('Y-m-d');

        try {
            PhieuDangKyTiem::create([
                'id_Tre' => $request->input('id_Tre'),
                'id_NV' => Auth::user()->id,
                'ngayDKTiem' => $request->input('ngayDKTiem'),
                // 'tongTien' => $request->input('tongTien'),
                // 'soMui' => $request->input('soMui'),
                // 'tinhTrang' => $request->input('tinhTrang'),
                'ngayTao' => $ldate,

            ]);
            Session::flash('success', 'Phiếu đăng ký tiêm được tạo thành công!');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage('Phiếu đăng ký tiêm tạo không thành công!'));
            return false;
        }
        return true;
    }
}
