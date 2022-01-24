<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'idLoaiNV',
        'tenNV',
            'email',
            'password',
            'sdt',
            'diaChi',
            'CMND',
            'anh',
            'ngaySinh',
            'code',
            'gioiTinh',
            'tinhTrang',
        'email_verified_at',

        ];
}
