@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>


    @include('admin.alert')

    <!-- Striped rows start -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>THÔNG TIN NHÂN VIÊN</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    Nhân viên
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
                <input type="text" placeholder="tìm kiếm" />
                <a class="btn btn-primary" style="float: right; " href="{{url('nhanvien/create')}}">Create new</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach($nhanvien as $nv)
            <div class="col-lg-4">
                <div class="contact-box">
                    <a class="row" href="{{url('nhanvien/edit/'.$nv->id)}}">
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
                            <p><i class="fa fa-map-marker"></i> {{ $nv->diaChi }}</p>
                            @if ($nv->gioiTinh ==0)
                            <p><i class="fa fa-transgender"></i> Nữ</p>
                            @else
                            <p><i class="fa fa-transgender"></i> Nam</p>
                            @endif
                            <p><i class="fa fa-calendar"></i> {{ $nv->ngaySinh }}</p>
                            <p><i class="fa fa-phone"></i> {{ $nv->sdt }}</p>
                            @if ($nv->tinhTrang ==0)
                            <strong class="lock"><i class="fa fa-check-circle"></i> Bị khoá</strong>
                            @else
                            <strong class="status"><i class="fa fa-check-circle"></i> Đang hoạt động</strong>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{ $nhanvien->links() }}
@endsection
