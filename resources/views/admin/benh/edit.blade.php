@extends('admin.main')
@section('content')
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
                    <strong>Cập nhật</strong>
                </li>
            </ol>
        </div>

    </div>
    @include('admin.alert')
    <form method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tên bệnh</label>
                                <input type="text" class="form-control" value="{{ $benh->tenBenh}}" name="tenBenh" id="basicInput" >
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Mã bệnh</label>
                                <input type="text" class="form-control" value="{{$benh->code}}" name="code" id="helpInputTop" >
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Mô tả</label>

                                <input type="text" class="form-control" value="{{$benh->ghiChu}}" name="ghiChu" id="helpInputTop">
                            </div>
                            <button id="btn-submit" class="btn btn-secondary"><a style="color: #fff;" href="{{url('admin/benh/list')}}">Quay lại</a></button>
                            <button type="submit" id="btn-submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @csrf
    </form>

</div>


@endsection
