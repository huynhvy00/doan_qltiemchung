@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>
    @include('admin.alert')

    <!-- Striped rows start -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>LẬP PHIẾU ĐĂNG KÝ TIÊM CHỦNG THEO YÊU CẦU</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý phiếu tiêm
                </li>
                <li class="breadcrumb-item active">
                    <strong>Lập phiếu tiêm</strong>
                </li>
            </ol>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form method="post" enctype="multipart/form-data">
                        <!-- <section class="section"> -->
                        <div class="panel-body">

                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><b>Mã tiêm chủng:</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_Tre">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><b>Ngày đăng ký tiêm:</b></label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="ngayDKTiem">
                                    </div>
                                </div>
                                <!--  -->

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><b>Chọn loại vaccine:</b></label>
                                </div>
                                <div class="form-group row">
                                    <div class="vaccine">

                                        @foreach($vaccine as $vx)

                                        <div class="item-vx">
                                        <input name="id_VX" type="checkbox" class="form-check-input" id="gender">
                                            <div class="detail-vx">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" value="1" {{ (is_array(old('hobby')) && in_array(1, old('hobby'))) ? ' checked' : '' }}> football

                                                <div class="vaccine__metas">
                                                    <div class="vaccine__name"><b>{{ $vx->tenVX }}</b></div>
                                                    <div class="vaccine__price">{{ $vx->donGia }}</div>
                                                </div>
                                                @foreach($benh as $b)
                                                @if($vx->code == $b->code)
                                                <div class="vaccine__description">{{$b->tenBenh}}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <hr>
                                <p class="exam" style="float: left; margin-right: 20px;">Tổng tiền: </p>
                                <p class="exam">Số lượng: </p>

                                <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/treem/list')}}">Quay lại</a></button>
                                <button type="submit" id="btn-submit" class="btn btn-primary">Tạo mới</button>
                            </fieldset>
                        </div>
                        <!-- </section> -->
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>


    @endsection
