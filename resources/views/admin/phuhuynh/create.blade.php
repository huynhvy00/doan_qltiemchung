@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>
    @include('admin.alert')
    <!-- Striped rows start -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIn HỒ SƠ PHỤ HUYNH</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/main">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý thông tin phụ huynh
                </li>
                <li class="breadcrumb-item active">
                    <strong>Thêm mới</strong>
                </li>
            </ol>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="panel-body">
                <fieldset>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên phụ huynh:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tenPH" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày sinh:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="ngaySinh" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mật khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sdt" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chứng minh nhân dân:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="CMND" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="diaChi" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính:</label>
                        <div class="col-sm-10">
                            <select name="gioiTinh" class="form-control">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Khu vực:</label>
                        <div class="col-sm-10">
                            <select name="code" class="form-control">
                                @foreach($khuvuc as $kv)
                                <option value="{{$kv->code}}">{{$kv->tenKV}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh:</label>
                        <div class="col-sm-10">
                            <input type="file" id="formFile" name="anh">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ghi chú:</label>
                        <div class="col-sm-10">
                            <div class="ibox-content no-padding">
                                <div class="summernote" name="ghiChu" style="display: none;">
                                    <input type="text" class="form-control" name="ghiChu" placeholder="Ghi chú cho vaccine">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('phuhuynh/list')}}">Quay lại</a></button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Tạo mới</button>
            </div>
            </fieldset>
</div>
</section>
@csrf
</form>
@endsection



