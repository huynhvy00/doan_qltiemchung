@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>
    @include('admin.alert')
    <!-- Striped rows start -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN HỒ SƠ NHÂN VIÊN</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Hồ sơ nhân viên
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
        <button style="background: none; border: none;">
            <a class="btn btn-primary" style="float: right; " href="{{url('nhanvien/create')}}">Thêm nhân viên mới</a>
        </button>
    </div>
    <section class="section">
        <div class="tabs-container" style="margin-top: 20px;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Nhân viên y tế</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">Nhân viên trung tâm</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active show">
                    <div class="panel-body">
                        <div class="wrapper wrapper-content animated fadeInRight">
                            <div class="row">
                                @foreach($nhanvienyte as $nv)
                                <div class="col-lg-4">
                                    @if($nv->code == 'HC')
                                    <div class="contact-box1">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'CL')
                                    <div class="contact-box2">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'ST')
                                    <div class="contact-box3">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'NHS')
                                    <div class="contact-box4">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'LC')
                                    <div class="contact-box5">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <div class="wrapper wrapper-content animated fadeInRight">
                            <div class="row">
                                @foreach($nhanvientrungtam as $nv)
                                <div class="col-lg-4">
                                    @if($nv->code == 'HC')
                                    <div class="contact-box1">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'CL')
                                    <div class="contact-box2">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'ST')
                                    <div class="contact-box3">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'NHS')
                                    <div class="contact-box4">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($nv->code == 'LC')
                                    <div class="contact-box5">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="/images/phuhuynh/{{ $nv->anh }}">
                                                @foreach($khuvuc as $kv)
                                                @if($nv->code == $kv->code)
                                                <div class="m-t-xs font-bold">Khu vực<br> {{ $kv->tenKV }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3><strong>{{ $nv->tenNV }}</strong></h3>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                                            @if ($nv->gioiTinh ==0)
                                            <p style="margin-bottom: 10px;">
                                                <i class="fa fa-transgender"></i>
                                                Nữ
                                            </p>
                                            @else
                                            <p style="margin-bottom: 10px;"><i class="fa fa-transgender"></i> Nam</p>
                                            @endif
                                            <p style="margin-bottom: 10px;"><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                                            <p style="margin-bottom: 10px;"><i class="fa fa-star"></i> {{ $nv->CMND }}</p>
                                            <div style="flex-direction: row; display: flex; gap: 30px">
                                                @if ($nv->tinhTrang ==0)
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="lock">
                                                        <i class="fa fa-check-cancle"></i> Bị khoá
                                                    </strong>
                                                </a>
                                                @else
                                                <a href="{{url('nhanvien/active/'.$nv->id)}}">
                                                    <strong class="status">
                                                        <i class="fa fa-check-circle"></i>
                                                        Đang hoạt động
                                                    </strong>
                                                </a>
                                                @endif
                                                <a href="{{url('nhanvien/detail/'.$nv->id)}}"><i class="fa fa-info" style="color: yelow ;font-size: 20px;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
{{ $nhanvien->links() }}
@endsection
