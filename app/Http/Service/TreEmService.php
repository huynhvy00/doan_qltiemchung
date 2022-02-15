<?php

namespace App\Http\Service;

use App\Models\PhuHuynh;
use App\Models\Room;
use App\Models\TreEm;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class TreEmService
{
    public function getTre($code){
        return TreEm::where('code','like',$code.'%')->orderByDesc('id')->get();
        // return PhuHuynh::where('code',$code)->orderBy('tinhTrang','DESC')->get();
    }
}
