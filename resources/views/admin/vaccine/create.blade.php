@extends('admin.main')
@section('content')
<?php $i = 0; ?>
<div>


    @include('admin.alert')

    <!-- Striped rows start -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/main">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Vaccine
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
                        <label class="col-sm-2 col-form-label">Tên vaccine:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tenVX" placeholder="Tên vaccine">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Loại bệnh:</label>
                        <div class="col-sm-10">
                            <select name="code" class="form-control">
                                @foreach($benh as $b)
                                <option value="{{$b->code}}">{{$b->tenBenh}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" name="code" placeholder="Loại bệnh"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lô sản xuất:</label>
                        <div class="col-sm-10">
                            <select name="code_lo" class="form-control">
                                @foreach($losx as $lo)
                                <option value="{{$lo->soLo}}">{{$lo->soLo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Đối tượng:</label>
                        <div class="col-sm-10">
                            <select name="id_DoiTuong" class="form-control">
                                @foreach($doituong as $dt)
                                <option value="{{$dt->id}}">{{$dt->tenDT}} - {{$dt->doTuoi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày sản xuất</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="ngaySX" placeholder="Nhà sản xuất">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hạn sử dụng:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="hanSD" placeholder="Hạn sử dụng">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="soLuong" placeholder="Số lượng">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Đơn giá</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="donGia" placeholder="Đơn giá">
                        </div>
                    </div>
                    <!-- <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày nhập về:</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="ngayNhap" placeholder="Ngày nhập"></div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ghi chú:</label>
                        <div class="col-sm-10">
                            <div class="ibox-content no-padding">
                                <div class="summernote" name="ghiChu" style="display: none;">
                                    <input type="text" class="form-control" name="ghiChu" placeholder="Ghi chú cho vaccine">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ảnh:</label>
                <div class="col-sm-10">
                    <input type="file" id="formFile" name="anh">
                </div>
            </div>
            <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('vaccine/list')}}">Quay lại</a></button>
            <button type="submit" id="btn-submit" class="btn btn-primary">Tạo mới</button>
            </fieldset>
</div>
</section>
@csrf
</form>
@endsection
