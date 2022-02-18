@extends('admin.main')
@section('content')
<div>
    @include('admin.alert')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/main">Home</a>
                </li>
                <li class="breadcrumb-item">
                    Vaccine
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cập nhật</strong>
                </li>
            </ol>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="panel-body">

                <fieldset>
                    <h3>Cập nhật thông tin vaccine (MÃ: {{ $vaccine ->id }})</h3>
                    </br>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên vaccine:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tenVX" value="{{$vaccine->tenVX}}">
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

                            <input type="date" class="form-control" name="ngaySX" value="{{$vaccine->ngaySX}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hạn sử dụng:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="hanSD" value="{{$vaccine->hanSD}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số lượng:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="soLuong" value="{{$vaccine->soLuong}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Đơn giá</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="donGia" value="{{$vaccine->donGia}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tình trạng:</label>
                        <div class="col-sm-10">
                            <select name="tinhTrang" class="form-control">
                                <option value="1">Còn</option>
                                <option value="0">Hết</option>
                                <option value="2">Thu hồi</option>
                            </select>
                         </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh:</label>
                        <div class="mb-3" style="margin-left: 15px;">
                            <img src="/images/vx/{{ $vaccine->anh }}" height="100px" width="100px">
                        </div>
                        <div class="col-sm-10">
                            <input type="file" id="formFile" name="anh">
                        </div>
                    </div>
                    <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/vaccine/list')}}">Quay lại</a></button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Cập nhật</button>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ghi chú:</label>
                        <div class="col-sm-10">
                            <div class="ibox-content no-padding">
                                <div class="summernote" name="ghiChu" style="display: none;">
                                    <input type="text" class="form-control" name="ghiChu" value="{{$vaccine->ghiChu}}">
                                </div>
                            </div>


                        </div>
                    </div> -->
            </div>

            </fieldset>


</div>
</section>
@csrf
</form>

@endsection
