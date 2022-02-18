@extends('admin.main')
@section('content')
<div class="page-heading">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>TẠO MỚI HỒ SƠ TRẺ EM</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Trẻ em
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tạo mới</strong>
                </li>
            </ol>
        </div>

    </div>
    @include('admin.alert')
    <form method="post" enctype="multipart/form-data">
        <!-- <section class="section"> -->
        <div class="panel-body">

            <fieldset>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mã tiêm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ và tên:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tenTre">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ngày sinh:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="ngaySinh">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Đối tượng:</label>
                    <div class="col-sm-10">
                        <select name="id_DT" class="form-control">
                            @foreach($doituong as $dt)
                            <option value="{{$dt->id}}">{{$dt->tenDT}} - {{$dt->doTuoi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CMND phụ huynh:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_PH">
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

                <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/treem/list')}}">Quay lại</a></button>
                <button type="submit" id="btn-submit" class="btn btn-primary">Tạo mới</button>
            </fieldset>
        </div>
        <!-- </section> -->
        @csrf
    </form>
</div>
@endsection
