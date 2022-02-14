<?php

namespace App\Http\Service;

use App\Models\PhuHuynh;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class PhuHuynhService
{
    public function getPhuHuynh($code){
        return PhuHuynh::where('code',$code)->orderBy('tinhTrang','DESC')->get();
    }
    public function active($phuhuynh){
        $phuhuynh = PhuHuynh::where('id',$phuhuynh)->First();
        //dd($phuhuynh);
        if($phuhuynh->tinhTrang == 1)
        {
            $phuhuynh->tinhTrang = 0;
        }else{
            $phuhuynh->tinhTrang = 1;
        }
        $phuhuynh->save();
        Session::flash('success','Cập nhật trạng thái tài khoản phụ huynh thành công!');
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
