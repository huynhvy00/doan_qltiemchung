<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuDangKyTiem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Tre',
        'id_NV',
        'ngayDKTiem',
        'tongTien',
        'tinhTrang',
        'ngayTao',
        'soMui',
        'del'
    ];
}
