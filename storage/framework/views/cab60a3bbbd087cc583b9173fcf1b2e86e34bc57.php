

<?php $__env->startSection('title','ملفي الشخصي'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">ملفي الشخصي</h2>

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <img src="<?php echo e(auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '/logo/logo.jpg'); ?>" class="h-44 w-44 object-cover rounded shadow">
      </div>
      <div>
        <p><strong>الاسم:</strong> <?php echo e(auth()->user()->name); ?></p>
        <p><strong>البريد:</strong> <?php echo e(auth()->user()->email); ?></p>
        <p><strong>الهاتف:</strong> <?php echo e(auth()->user()->phone); ?></p>
        <p><strong>الدور:</strong> <?php echo e(auth()->user()->affiliation_office ?? '---'); ?></p>
        <p><strong>حالة الموافقة:</strong> <?php echo e(auth()->user()->approval_status); ?></p>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\labo\Desktop\nahda-platform\resources\views/profile/my-profile.blade.php ENDPATH**/ ?>