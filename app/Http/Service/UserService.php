<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class UserService
{
    public function getUser($idLoaiNV)
    {
        return User::where('idLoaiNV', $idLoaiNV)->orderByDesc('code')->get();
    }
    public function active($user){
        $user = User::where('id',$user)->First();
        //dd($phuhuynh);
        if($user->tinhTrang == 1)
        {
            $user->tinhTrang = 0;
        }else{
            $user->tinhTrang = 1;
        }
        $user->save();
        Session::flash('success','Cập nhật trạng thái tài khoản nhân viên thành công!');
    }
}
