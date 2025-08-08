

<?php $__env->startSection('title','تسجيل الدخول'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">تسجيل الدخول</h2>

    <?php if($errors->any()): ?>
      <div class="bg-red-50 text-red-700 p-3 rounded mb-3">
        <?php echo e($errors->first()); ?>

      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('login.submit')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <label class="block mb-1">البريد الإلكتروني</label>
      <input name="email" type="email" required class="w-full border p-2 rounded mb-3" value="<?php echo e(old('email')); ?>">

      <label class="block mb-1">كلمة المرور</label>
      <input name="password" type="password" required class="w-full border p-2 rounded mb-3">

      <div class="flex items-center justify-between mb-4">
        <label class="inline-flex items-center">
          <input type="checkbox" name="remember" class="mr-2"> تذكرني
        </label>
        <a href="#" class="text-sm text-blue-600">نسيت كلمة المرور؟</a>
      </div>

      <button class="w-full py-2 rounded btn-primary">دخول</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\labo\Desktop\nahda-platform\resources\views/auth/login.blade.php ENDPATH**/ ?>