<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuTiem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Tre',
        'id_VX',
        'id_NV',
        'id_PhieuTiem',
        'ngayTiem',
        'bieuHienTruoc',
        'bieuHienSau',
        'chieuCao',
        'canNang',
        'nhipTim',
        'nhietDo',
        'tinhTrang'
    ];
}
