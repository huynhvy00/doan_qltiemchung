<?php

namespace App\Http\Service;

use App\Models\PhuHuynh;
use App\Models\Room;
use App\Models\Vaccine;
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

    // login-user
    public function postLogin($request){
       // dd($request);
        $request->validate([
            'CMND'=>'required',
            'password'=>'required'
        ]);
        $s_pass = $request->input('password');
        $s_code = $request->input('CMND');
        $s_data = $this->selectPhuHuynh($s_code);
        // dd($s_data);

        if(isset($s_data)){

            $student_pass = $s_data->password;
            // dd($student_pass);
            if(password_verify($s_pass,$student_pass)){

                $request->session()->put('phuhuynh',$s_data->CMND);
                // dd(session('phuhuynh'));
                $request->session()->put('tenPH',$s_data->tenPH);
                redirect()->back();
            }else{
                Session::flash('error','Mật khẩu sai. Vui lòng nhập lại');
                redirect()->back();
            }
        }else{
            Session::flash('error','Mã sinh viên không tồn tại.');
            redirect()->back();
        }

    }
    public function selectPhuHuynh($CMND){
        // dd($CMND);
        return PhuHuynh::where('CMND',$CMND)->where('tinhTrang',1)->First();
    }
    //

    public function getAllDangKy()
    {
        $vaccine = Vaccine::latest()->where('ghiChu',1)->paginate(50);

        return view('dang-ky-tiem', [
            'title' => 'Danh sách vaccine', 'vaccine' => $vaccine,

        ]);
    }

}
