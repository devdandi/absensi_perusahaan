<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="alert alert-primary" role="alert">
    <h4>Selamat datang <b><?php echo e(Auth::user()->name); ?></b></h4>
    <span>Tanggal: <?php echo e(date('d/m/Y')); ?> </span><span id="jam"></span>
    <br>
    <span>Jam masuk: <?php echo e($config[0]->jam_masuk); ?></span>
    <br>
    <span>Jam keluar: <?php echo e($config[0]->jam_keluar); ?></span>
</div>
<?php if($message = session('success')): ?>
<div class="alert alert-success" role="alert">
   <?php echo e($message); ?>

</div>
<?php elseif($message = session('error')): ?>
<div class="alert alert-danger" role="alert">
   <?php echo e($message); ?>

</div>
<?php endif; ?>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <span class="text-center">
                    <b>ABSEN MASUK</b>
                </span>
                <hr>
                <?php if(App\Absent::where('id_user', Auth::id())->whereDate('created_at','=',\Carbon\Carbon::today()->toDateTimeString())->where('status','IN')->count() > 0): ?> 
                <button type="button" disabled class="btn btn-primary">SUDAH ABSEN</button>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                <?php else: ?>
                <a onclick="return confirm('Yakin ingin absen masuk ? ')" type="button" class="btn btn-primary" href="<?php echo e(route('in')); ?>">MASUK</a>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <span class="text-center">
                    <b>ABSEN KELUAR</b>
                </span>
                <hr>
                <?php if(App\Absent::where('id_user', Auth::id())->whereDate('created_at','=',\Carbon\Carbon::today()->toDateTimeString())->where('status','OUT')->count() > 0): ?> 
                <button type="button" disabled class="btn btn-primary">SUDAH ABSEN</button>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                <?php elseif(App\Absent::where('id_user', Auth::id())->whereDate('created_at','=',\Carbon\Carbon::today()->toDateTimeString())->where('status','IN')->count() < 1): ?>
                <button type="button" disabled class="btn btn-warning">ABSEN MASUK DULU</button>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                <?php else: ?>
                <a onclick="return confirm('Yakin ingin absen masuk ? ')" type="button" class="btn btn-danger" href="<?php echo e(route('out')); ?>">PULANG</a>
                    <small style="color: red"><i>Berlaku 1x klik</i></small>
                <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\absensi_app\resources\views/home.blade.php ENDPATH**/ ?>