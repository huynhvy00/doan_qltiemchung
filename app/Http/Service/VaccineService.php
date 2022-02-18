<?php

namespace App\Http\Service;

use App\Models\PhieuDangKyTiem;
use App\Models\Room;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class VaccineService
{
    public function getAll($request){

            return Vaccine::where('tenVX','like','%'.$request->key_search.'%')
            // ->orWhere('donGia','like','%'.$request->key_search.'%')
            ->where('ghiChu',1)
            ->orderByDesc('id')->paginate(20);


    //    return Vaccine::where('ghiChu',1)->orderByDesc('id')->paginate(20);
   }
}
