@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-primary" role="alert">
    <h4>Selamat datang <b>{{ Auth::user()->name }}</b></h4>
    <span>Tanggal: {{ date('d/m/Y') }} </span><span id="jam"></span>
    <br>
    <span>Jam masuk: {{ $config[0]->jam_masuk }}:00</span>
    <br>
    <span>Jam keluar: {{ $config[0]->jam_keluar }}:00</span>
</div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <span class="text-center">
                    ABSEN MASUK
                </span>
                <hr>
                @if($absen->count() < 1)
                    <a type="button" class="btn btn-primary" href="{{ route('in')}}">MASUK</a>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                @else
                    <button type="button" class="btn btn-primary" disabled>Sudah absen</button>
                    <small style="color: red"><i>Kamu telah melakukan absen untuk masuk</i></small>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <span class="text-center">
                    ABSEN KELUAR
                </span>
                <hr>
                <button type="button" class="btn btn-danger">KELUAR</button>
                <small style="color: red"><i>Berlaku 1x klik</i></small>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <span class="text-center">
                    ABSEN LEMBUR
                </span>
                <hr>
                <button type="button" class="btn btn-info">LEMBUR</button>
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
