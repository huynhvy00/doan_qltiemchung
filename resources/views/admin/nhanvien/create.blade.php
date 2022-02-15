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
                    <a href="/main">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý thông tin nhân viên
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
                        <label class="col-sm-2 col-form-label">Tên nhân viên:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tenNV">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày sinh:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="ngaySinh">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Giới tính:</label>
                        <div class="" style="margin-left: 35px;">
                            <label class="form-check-label" for="gioiTinh" style="margin-right: 50px;">
                                <input name="gioiTinh" type="radio" class="form-check-input" value="1" id="gender">Nam</label>
                            <label class="form-check-label">
                                <input name="gioiTinh" type="radio" class="form-check-input" value="0">Nữ</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chứng minh nhân dân:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="CMND">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mật khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sdt">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="diaChi">
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
                        <label class="col-sm-2 col-form-label">Loại nhân viên:</label>
                        <div class="col-sm-10">
                            <select name="idLoaiNV" class="form-control">
                                <option value="1">Nhân viên y tế</option>
                                <option value="2">Nhân viên trung tâm</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh:</label>
                        <div class="col-sm-10">
                            <input type="file" id="formFile" name="anh">
                        </div>
                    </div>

                    <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('nhanvien/list')}}">Quay lại</a></button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Tạo mới</button>
            </div>
            </fieldset>
</div>
</section>
@csrf
</form>
@endsection
