<?php

namespace App\Http\Service;

use App\Models\PhieuDangKyTiem;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class PhieuTiemService
{
    public function getPhieuDK($tinhTrang){
        return PhieuDangKyTiem::where('tinhTrang',$tinhTrang)->orderBy('ngayDKTiem','ASC')->get();
    }

    // public function update($request, $room){
    //     try{
    //         $room->update([
    //             'message'=>$request->input('message'),
    //             'message_title'=>$request->input('message_title'),
    //         ]);
    //         Session::flash('success','Cập nhật thông tin ghi chú thành công.');
    //     }catch(Exception $err){
    //         Session::flash('error',$err->getMessage());
    //         return false;
    //     }
    //     return true;
    // }
}
