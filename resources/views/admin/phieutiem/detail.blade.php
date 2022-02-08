@extends('admin.main')
@section('content')
<div>
    @include('admin.alert')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h3>QUẢN LÝ THÔNG TIN VACINE</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/main">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    Quản lý phiếu tiêm
                </li>
                <li class="breadcrumb-item active">
                    <strong>Chi tiết phiếu tiêm</strong>
                </li>
            </ol>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <section class="section" style="background: #fff;
    margin-top: 20px;">
            <div class="panel-body">

                <fieldset>
                    <h3>Chi tiết phiếu đăng ký tiêm (MÃ: {{ $phieudk ->id }})</h3>
                    </br>
                    <h3>Thông tin trẻ đăng ký</h3>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Họ và tên trẻ:</label>
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-form-label">{{$phieudk->id_Tre}}</label>

                            <!-- <input type="text" class="form-control" name="tenVX" value="{{$vaccine->tenVX}}"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Loại bệnh:</label>
                        <div class="col-sm-10">
                            @foreach($nhanvien as $nv)
                            @if($phieudk ->id_NV == $nv ->id)
                            <label class="col-sm-2 col-form-label">{{$nv->tenNV}}</label>
                            @endif
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" name="code" value="{{$vaccine->code}}"> -->
                        </div>
                    </div>
                    <h3>Thông tin phiếu tiêm</h3>
                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lô sản xuất:</label>
                        <div class="col-sm-10">
                        </div>
                    </div>

                    <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('vaccine/list')}}">Quay lại</a></button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Cập nhật</button>
                </fieldset>


            </div>
        </section>
        @csrf
    </form>

    @endsection
