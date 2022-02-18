<?php

namespace App\Http\Service;

use App\Models\ChiTietMuiTiem;
use App\Models\PhieuDangKyTiem;
use App\Models\Room;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class PhieuTiemService
{
    public function getPhieuDK($tinhTrang)
    {

        return PhieuDangKyTiem::where('tinhTrang', $tinhTrang)->where('del', 1)->orderBy('ngayDKTiem', 'DESC')->get();
    }
// xoa phieutiem
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
        $vx = $request->id_VX;

        foreach ($vx as $v){
           $vac[] = Vaccine::where('id',$v)->get();
        }
       // dd($vac);
        $tongTien = 0;
        foreach ($vac as $v){
            $tongTien += $v[0]['donGia'];
        }
// dd($tongTien);
       //  dd($vac[0][0]['id_VX']);
        $phieu = new PhieuDangKyTiem();

        try {

            $phieu->id_Tre = $request->input('id_Tre');
            $phieu->id_NV = Auth::user()->id;
            $phieu->ngayDKTiem = $request->input('ngayDKTiem');
            $phieu->tongTien = $tongTien;
            $phieu->soMui = count($vx);
                // 'tinhTrang' => $request->input('tinhTrang'),
                $phieu->ngayTao = $ldate;
                $phieu->save();

                foreach ($vac as $v){
                    $chiTiet = new ChiTietMuiTiem();
                    $chiTiet->id_VX = $v[0]['id'];
                    $chiTiet->id_NV = Auth::user()->id;
                    $chiTiet->id_PhieuDK = $phieu->id;
                    $chiTiet->ngayTiem = $request->input('ngayDKTiem');
                    $chiTiet->donGia = $v[0]['donGia'];
                    $chiTiet->save();

                }


            Session::flash('success', 'Phiếu đăng ký tiêm được tạo thành công!');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage('Phiếu đăng ký tiêm tạo không thành công!'));
            return false;
        }
        return true;
    }
}
