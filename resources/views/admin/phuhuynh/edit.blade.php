@extends('admin.main')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Category {{ $phuhuynh->id }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @include('admin.alert')
    <form method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" id="formedit">
                            <div id="avt">
                                <div class="mb-3">
                                    <td><img src="/images/phuhuynh/{{ $phuhuynh->anh }}" height="100px" width="100px" ></td>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Thay đổi ảnh đại diện:</label>
                                    <input class="form-control" type="file" id="formFile" name="anh">
                                </div>
                            </div>
                            <div>
                            <div class="form-group">
                                    <label for="basicInput">Họ và tên</label>
                                    <input readonly type="text" class="form-control" name="tenPH" id="basicInput" value="{{$phuhuynh->tenPH}}">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Ngày sinh:</label>
                                    <input readonly type="text" class="form-control" name="email" id="ngaySinh" value="{{$phuhuynh->ngaySinh}}">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">CMND:</label>
                                    <input readonly type="text" class="form-control" name="email" id="CMND" value="{{$phuhuynh->CMND}}">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Giới tính:</label>
                                    <input readonly type="text" class="form-control" name="gioiTinh" id="gioiTinh" value="{{$phuhuynh->gioiTinh}}">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="basicInput">Email:</label>
                                    <input readonly type="text" class="form-control" name="email" id="basicInput" value="{{$phuhuynh->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">Số điện thoại:</label>
                                    <input type="text" class="form-control" name="sdt" id="helpInputTop" value="{{$phuhuynh->sdt}}">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Mật khẩu:</label>
                                    <input type="text" class="form-control" name="password" id="basicInput" value="{{$phuhuynh->password}}">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">Địa chỉ:</label>
                                    <input type="text" class="form-control" name="diaChi" id="helpInputTop" value="{{$phuhuynh->diaChi}}">
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Khu vực:</label>
                                    <select name="code" class="btn btn-secondary dropdown-toggle me-1" style="width: 250px; margin-left: 10px;">
                                    @foreach($khuvuc as $kv)
                                        <option value="{{$kv->code}}">{{$kv->tenKV}}</option>
                                    @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" name="idKV" id="basicInput" value="{{$phuhuynh->idKV}}"> -->
                                </div>
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @csrf
    </form>
</div>
@endsection
