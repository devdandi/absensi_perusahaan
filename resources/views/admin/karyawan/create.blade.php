@extends('layouts.admin')
@section('title','Halaman Utama')

@section('content')
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Website Absensi Perusahaan</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title"></h4>
										<div class="card-tools">
											<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
											<button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
											<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
										</div>
									</div>
									<p class="card-category">
									Tambah Karyawan Baru</p>
                                </div>
                                @if($message = session('success'))
                                    <div class="alert alert-success" role="alert">{{ $message }}</div>
                                @elseif($message = session('error'))
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @endif
								<div class="card-body">
                                    
									<div class="row">
										<div class="col-md-12">
                                        <form method="post" action="{{ route('karyawan.create') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NIK</label>
                                                <input type="number" value="{{ old('nik') }}" onchange="checkNIK(this)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nik" id="nik">
                                                <span style="color: red" id="nik_message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nama</label>
                                                <input type="text" value="{{ old('nama') }}" class="form-control" id="exampleInputPassword1" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" value="{{ old('email') }}"  class="form-control" id="exampleInputPassword1" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                                <input type="date"  class="form-control" id="exampleInputPassword1" name="dob">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jabatan</label>
                                                <select name="jabatan" id="" class="form-control">
                                                    <option value="Pilih">Pilih</option>
                                                    <option value="Karyawan">Karyawan</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Konfirmasi Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password2">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            </div>
            
@endsection