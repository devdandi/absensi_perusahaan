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
									Daftar Karyawan di perusahaan</p>
                                </div>
                                @if($message = session('success'))
                                    <div class="alert alert-success" role="alert">{{ $message }}</div>
                                @elseif($message = session('error'))
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @endif
								<div class="card-body">
                                    
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive table-hover table-sales">
											<form class="navbar-left navbar-form nav-search mr-md-3" method="POST" action="{{ route('karyawan.cari') }}">
											@csrf
												<div class="input-group">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-search pr-1">
															<i class="fa fa-search search-icon"></i>
														</button>
													</div>
													<input type="text" placeholder="Search ..." name="search" class="form-control">
												</div>
											</form>
												<table class="table">
													<tbody>
														<tr>
															<th>#</th>
															<th>NIK</th>
															<th>Nama</th>
															<th>Email</th>
															<th>Jabatan</th>
															<th>Bergabung Tanggal</th>
															<th>Status</th>
															<th>Aksi</th>
														</tr>
														@foreach($karyawan as $no => $data_karyawan)
															<tr>
																<td>{{ $no+1 }}</td>
																<td>{{ $data_karyawan->nik }}</td>
																<td>{{ $data_karyawan->name }}</td>
																<td>{{ $data_karyawan->email }}</td>
																<td>{{ $data_karyawan->jabatan }}</td>
																<td>{{ date('d/m/Y', strtotime($data_karyawan->created_at)) }}</td>
																@if($data_karyawan->status === 1)
																	<td style="color: green">AKTIF</td>
																@else
																	<td style="color: red">NONAKTIF</td>
																@endif
																<td>
                                                                    <form method="POST" action="{{ route('karyawan.delete', $data_karyawan->id) }}">
                                                                        @csrf
                                                                        <button class="btn btn-danger" onclick="return confirm('Hapus ? Setelah di hapus data tidak dapat di kembalikan')">Hapus</button>
                                                                    </form>
                                                                </td>
															</tr>
														@endforeach
													</tbody>
                                                </table>
                                                {{ $karyawan->links() }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
			</div>
@endsection