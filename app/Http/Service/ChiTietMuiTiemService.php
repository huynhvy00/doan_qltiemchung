<?php

namespace App\Http\Service;

use App\Models\ChiTietMuiTiem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class ChiTietMuiTiemService
{
    public function getChiTiet($tinhTrang ,$ttPhieu)
    {
        $chitiet = ChiTietMuiTiem::select(
           'chi_tiet_mui_tiems.*',
        //    'phieu_dang_ky_tiems.tinhTrang',
        )
        ->join('phieu_dang_ky_tiems', 'phieu_dang_ky_tiems.id', '=', 'chi_tiet_mui_tiems.id_PhieuDK')
        ->where('chi_tiet_mui_tiems.tinhTrang', $tinhTrang)
        ->where('phieu_dang_ky_tiems.tinhTrang', $ttPhieu)

        ->orderBy('chi_tiet_mui_tiems.ngayTiem', 'DESC')->get();

        return $chitiet;
    }

    // public function createChiTiet($request)
    // {
    //    dd($request);
    //     $request->validate([
    //         'id_VX' => 'required',
    //         // 'id_NV' => 'required',
    //         'ngayTiem' => 'required',
    //         'id_PhieuDK' => 'required',
    //         'donGia' => 'required',
    //         // 'soLuong' => 'required',
    //         // 'soMui' => 'required',
    //     ]);
    //     // $ldate = date('Y-m-d');

    //     try {
    //         ChiTietMuiTiem::create([
    //             'id_VX' => $request->input('id_VX'),
    //             'ngayTiem' => $request->input('ngayTiem'),
    //             'donGia' => $request->input('donGia'),
    //             // 'soLuong' => $request->input('soLuong'),
    //             'id_NV' => Auth::user()->id,
    //             // 'ngayDKTiem' => $request->input('ngayDKTiem'),
    //             // 'id_PhieuDK' =>

    //         ]);
    //         Session::flash('success', 'Phiếu đăng ký tiêm được tạo thành công!');
    //     } catch (Exception $err) {
    //         Session::flash('error', $err->getMessage('Phiếu đăng ký tiêm tạo không thành công!'));
    //         return false;
    //     }
    //     return true;
    // }
}
