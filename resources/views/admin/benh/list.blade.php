@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN BỆNH HỌC</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Bệnh học
                </li>
                <li class="breadcrumb-item active">
                    <strong>Thêm mới</strong>
                </li>
            </ol>
        </div>
        <button>
            <a class="btn btn-primary" style="float: right; " href="{{url('benh/create')}}">Thêm mới</a>
        </button>
    </div>

    @include('admin.alert')
    </div>
    <!-- Striped rows start -->

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            @foreach($benh as $nv)
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>STT: {{++$i}} - Bệnh: {{ $nv->tenBenh }} - Mã code: {{ $nv->code }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link" href="{{url('benh/edit/'.$nv->id)}}">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link" href="{{url('benh/delete/'.$nv->id)}}">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>Ghi chú: {{ $nv->ghiChu }}</p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>


{{ $benh->links() }}

@endsection
