@extends('admin.main')
@section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>TẠO TÀI KHOẢN PHỤ HUYNH</h3>
                    </div>

                    <div class="col-12 col-md-6 order-md-2 order-first">

                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/main">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Họ và tên</label>
                                    <input type="text" class="form-control"name="tenPH" id="basicInput" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">email</label>
                                    <input type="text" class="form-control" name="email" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">password</label>
                                    <input type="text" class="form-control" name="password" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">sdt</label>
                                    <input type="text" class="form-control" name="sdt" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">diaChi</label>
                                    <input type="text" class="form-control" name="diaChi" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">CMND</label>
                                    <input type="text" class="form-control" name="CMND" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">ngaySinh</label>
                                    <input type="date" class="form-control" name="ngaySinh" id="helpInputTop" placeholder="Enter slug">
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">idKV</label>
                                    <select name="code"  style="width: 250px; margin-left: 10px;">
                                    @foreach($khuvuc as $kv)
                                        <option value="{{$kv->code}}">{{$kv->tenKV}}</option>
                                    @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" name="idKV" id="helpInputTop" placeholder="Enter slug"> -->
                                </div>
                                <div class="form-group">
                                    <label for="helpInputTop">gioiTinh</label>
                                    <input type="text" class="form-control" name="gioiTinh" id="helpInputTop" placeholder="Enter slug">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choose banner image</label>
                                    <input class="form-control" type="file" id="formFile" name="anh">
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
