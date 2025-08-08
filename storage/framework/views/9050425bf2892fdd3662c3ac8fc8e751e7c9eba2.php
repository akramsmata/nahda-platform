

<?php $__env->startSection('title','إنشاء حساب جديد'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">إنشاء حساب جديد</h2>

    <form action="<?php echo e(route('register.store')); ?>" method="post">
      <?php echo csrf_field(); ?>

      <label class="block mb-1">الاسم الكامل</label>
      <input name="full_name" required class="w-full border p-2 rounded mb-3" value="<?php echo e(old('full_name')); ?>">

      <label class="block mb-1">البريد الإلكتروني (اختياري)</label>
      <input name="email" type="email" class="w-full border p-2 rounded mb-3" value="<?php echo e(old('email')); ?>">

      <label class="block mb-1">كلمة المرور (مرتين)</label>
      <input name="password" type="password" class="w-full border p-2 rounded mb-3">
      <input name="password_confirmation" type="password" class="w-full border p-2 rounded mb-3">

      <label class="block mb-1">نوع الحساب</label>
      <select name="account_type" required class="w-full border p-2 rounded mb-3">
        <option value="user">مستخدم عادي</option>
        <option value="journalist">صحفي</option>
      </select>

      <label class="block mb-1">الدور (اكتب حرفياً)</label>
      <input name="affiliation_office" placeholder="المكتب الوطني أو المكتب الولائي" class="w-full border p-2 rounded mb-3" value="<?php echo e(old('affiliation_office')); ?>">

      <p class="text-sm text-gray-500 mb-3">بعد إنشاء الحساب ستتم مطالبتك باستكمال ملفك الشخصي (اختيار الولاية والمزيد)</p>

      <button class="w-full py-2 rounded btn-primary">إنشاء حساب والمتابعة</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\labo\Desktop\nahda-platform\resources\views/auth/register-member.blade.php ENDPATH**/ ?>