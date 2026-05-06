

<?php $__env->startSection('title', 'Manajemen Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0"><i class="fas fa-images me-2 text-primary"></i> Daftar Galeri</h5>
    <a href="<?php echo e(route('admin.galeri.create')); ?>" class="btn-primary-custom btn">
        <i class="fas fa-plus me-2"></i> Tambah Galeri
    </a>
</div>

<div class="card-premium">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr><th>#</th><th>Gambar</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="preview-img"></td>
                    <td><strong><?php echo e(Str::limit($item->judul, 30)); ?></strong></td>
                    <td><span class="badge-info badge"><?php echo e($item->kategori); ?></span></td>
                    <td><?php if($item->status): ?><span class="badge-success badge">Aktif</span><?php else: ?><span class="badge-danger badge">Tidak</span><?php endif; ?></span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?php echo e(route('admin.galeri.edit', $item->id)); ?>" class="btn btn-outline-custom"><i class="fas fa-edit"></i></a>
                            <form action="<?php echo e(route('admin.galeri.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-custom" style="border-color: #ef4444; color: #ef4444;" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="text-center py-4">Belum ada data galeri</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="mt-3">
        <?php echo e($galeri->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SEMESTER 2\Proyek Akhir 1 - PA 1\Template Proyek Akhir - Sibaganding\Sibaganding\Latihan\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>