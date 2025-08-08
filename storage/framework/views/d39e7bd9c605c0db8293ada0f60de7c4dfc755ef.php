

<?php $__env->startSection('title','الصفحة الرئيسية - حركة النهضة'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-bg text-white py-20">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-6 items-center">
    <div class="space-y-4">
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight fade-in-up">حركة النهضة</h1>
      <p class="text-lg md:text-xl opacity-90">مجتمع أصيل · دولة قوية · حضارة رائدة</p>

      <div class="flex items-center space-x-3 mt-6">
        <a href="<?php echo e(route('activities.index')); ?>" class="px-5 py-3 rounded btn-primary shadow">عرض النشاطات</a>
        <?php if(auth()->guard()->guest()): ?>
          <a href="<?php echo e(route('register.show')); ?>" class="px-5 py-3 rounded border bg-white bg-opacity-10">انضم الآن</a>
        <?php else: ?>
          <a href="<?php echo e(route('profile.my')); ?>" class="px-5 py-3 rounded border">ملفي</a>
        <?php endif; ?>
      </div>
    </div>

    <div class="relative">
      <div class="bg-white bg-opacity-10 rounded-xl p-6 shadow float-up">
        <img src="/logo/logo.jpg" alt="شعار" class="mx-auto h-48 w-48 object-cover rounded-full shadow-lg">
        <p class="text-center mt-4">شعار الحركة</p>
      </div>
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-8">
  <div class="grid md:grid-cols-3 gap-6">
    <div class="col-span-2 bg-white p-6 rounded shadow">
      <h2 class="text-xl font-bold mb-4">أحدث الأخبار</h2>
      <p class="text-sm text-gray-600">يمكنك نشر الأخبار من لوحة الإدارة. ستظهر هنا تلقائياً.</p>
    </div>

    <aside class="bg-white p-6 rounded shadow">
      <h3 class="font-semibold mb-2">عن الحركة</h3>
      <p class="text-sm text-gray-600">منصة مركزية لإدارة الأعضاء والنشاطات والأخبار.</p>
    </aside>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\labo\Desktop\nahda-platform\resources\views/home.blade.php ENDPATH**/ ?>