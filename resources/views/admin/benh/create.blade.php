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
                    <strong>Thêm mới</strong>
                </li>
            </ol>
        </div>
        <button>
            <a class="btn btn-primary" style="float: right; " href="{{url('vaccine/create')}}">Thêm mới</a>
        </button>
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
                                <input type="text" class="form-control" name="tenBenh" id="basicInput" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Code</label>
                                <input type="text" class="form-control" name="code" id="helpInputTop" placeholder="Enter slug">
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Ghi chú</label>
                                <input type="text" class="form-control" name="ghiChu" id="helpInputTop" placeholder="Enter slug">
                            </div>

                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @csrf
    </form>

</div>


@endsection
