

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Stats Row -->
<div class="row g-3">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number"><?php echo e($totalGaleri ?? 0); ?></div>
            <div class="stat-label">Total Galeri</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number"><?php echo e($totalBerita ?? 0); ?></div>
            <div class="stat-label">Total Berita</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number"><?php echo e($totalInformasi ?? 0); ?></div>
            <div class="stat-label">Total Informasi</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number"><?php echo e(number_format($totalViews ?? 0)); ?></div>
            <div class="stat-label">Total Views</div>
        </div>
    </div>
</div>

<!-- Recent News -->
<div class="card-table">
    <h5>Berita Terbaru</h5>
    <div class="table-responsive">
        <table>
            <thead>
                <tr><th>Judul</th><th>Tanggal</th><th>Status</th><th></th></tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = /* \App\Models\Berita::latest()->limit(5)->get()*/ []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(Str::limit($item->judul, 30)); ?></td>
                    <td><?php echo e($item->tanggal_terbit->format('d/m/Y')); ?></td>
                    <td><?php if($item->status): ?><span class="badge-success badge">Publish</span><?php else: ?><span class="badge-danger badge">Draft</span><?php endif; ?></td>
                    <td><a href="<?php echo e(route('admin.berita.edit', $item->id)); ?>" class="btn btn-sm btn-primary">Edit</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="action-buttons">
    <a href="<?php echo e(route('admin.galeri.create')); ?>" class="action-btn"><i class="fas fa-plus-circle"></i> Galeri</a>
    <a href="<?php echo e(route('admin.berita.create')); ?>" class="action-btn"><i class="fas fa-plus-circle"></i> Berita</a>
    <a href="<?php echo e(route('admin.informasi.create')); ?>" class="action-btn"><i class="fas fa-plus-circle"></i> Informasi</a>
    <a href="<?php echo e(url('/')); ?>" target="_blank" class="action-btn"><i class="fas fa-globe"></i> Website</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SEMESTER 2\Proyek Akhir 1 - PA 1\Template Proyek Akhir - Sibaganding\Sibaganding\Latihan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>