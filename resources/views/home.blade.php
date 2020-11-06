@extends('layouts.app')

@section('content')

<div class="container">
    <div class="alert alert-primary" role="alert">
    <h4>Selamat datang <b>{{ Auth::user()->name }}</b></h4>
    <span>Tanggal: {{ date('d/m/Y') }} </span><span id="jam"></span>
    <br>
    <span>Jam masuk: {{ $config[0]->jam_masuk }}</span>
    <br>
    <span>Jam keluar: {{ $config[0]->jam_keluar }}</span>
</div>
@if($message = session('success'))
<div class="alert alert-success" role="alert">
   {{ $message }}
</div>
@elseif($message = session('error'))
<div class="alert alert-danger" role="alert">
   {{ $message }}
</div>
@endif
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <span class="text-center">
                    <b>ABSEN MASUK</b>
                </span>
                <hr>
                    <a onclick="return confirm('Yakin ingin absen masuk ? ')" type="button" class="btn btn-primary" href="{{ route('in')}}">MASUK</a>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <span class="text-center">
                    <b>ABSEN KELUAR</b>
                </span>
                <hr>
                <a type="button" onclick="return confirm('Yakin ingin absen keluar ? ')" href="{{ route('out')}}" class="btn btn-danger">KELUAR</a>
                <small style="color: red"><i>Berlaku 1x klik</i></small>

            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <span class="text-center">
                    <b>ABSEN LEMBUR</b>
                </span>
                <hr>
                <button type="button" onclick="return confirm('Yakin ingin absen masuk ? ')" disabled class="btn btn-info">LEMBUR</button>
                <small style="color: red"><i>Berlaku 1x klik</i></small>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        window.onload = function() { jam(); }

        function jam() {
        var e = document.getElementById('jam'),
        d = new Date(), h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h +':'+ m +':'+ s;

        setTimeout('jam()', 1000);
        }

        function set(e) {
        e = e < 10 ? '0'+ e : e;
        return e;
 }
</script>
@endsection
