@extends('layouts.admin')

@section('title')
Admin | Pengaturan {{ config('settings.name') }}
@endsection

@section('sidebar')
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2><i class="nav-icon fas fa-cog"></i> Pengaturan</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengaturan</li>
                        </ol>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><br />
                        @endif
                        <div class="card">
                            <div class="card-header bg-primary text text-white">
                                Setting Website
                            </div>
                            <div class="card-body">
                                <form action="{{ route('ap.settings.update', 1) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <table
                                        class="table table-bordered table-hover table-sm table-responsive-sm text-center">
                                        <tr>
                                            <th> Nama Website</th>
                                            <td>
                                                <input type="text" class="form-control" id="name" name="setting[name]"
                                                    value="{{ config('settings.name') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>
                                                <textarea class="form-control" id="description"
                                                    name="setting[description]">{!! $setting['description'] !!}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>
                                                <textarea class="form-control" id="address"
                                                    name="setting[address]">{!! $setting['address'] !!}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Telephone</th>
                                            <td>
                                                <input type="number" class="form-control" id="telephone"
                                                    name="setting[telephone]"
                                                    value="{{ config('settings.telephone') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> E-mail</th>
                                            <td>
                                                <input type="email" class="form-control" id="email"
                                                    name="setting[email]" value="{{ config('settings.email') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Logo Website</th>
                                            <td>
                                                <img src="{{ asset('images/setting/'.$setting['logo']) }}"
                                                    style="width: 500px; height:auto;" class="rounded float-left">
                                                <input class="form-control " type="file" id="logo" name="setting[logo]"
                                                    value="{{ old('logo') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Icon Website</th>
                                            <td>
                                                <img src="{{ asset('images/setting/'.$setting['favicon']) }}"
                                                    style="width: 500px; height:auto;" class="rounded float-left">
                                                <input class="form-control " type="file" id="favicon"
                                                    name="setting[favicon]" value="{{ old('favicon') }}">
                                            </td>
                                        </tr>
                                    </table><br><br>
                                    <button type="submit" class="btn btn-primary btn-sm btn-round"><i
                                            class="fas fa-check"></i></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection