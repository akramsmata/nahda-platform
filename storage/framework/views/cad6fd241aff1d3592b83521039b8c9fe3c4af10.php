

<?php $__env->startSection('title','إكمال الملف الشخصي'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">إكمال الملف الشخصي</h2>

    <form action="<?php echo e(route('profile.complete.store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>

      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1">اسم الأب</label>
          <input name="father_name" class="w-full border p-2 rounded" value="<?php echo e(old('father_name')); ?>">
        </div>
        <div>
          <label class="block mb-1">اسم الأم</label>
          <input name="mother_name" class="w-full border p-2 rounded" value="<?php echo e(old('mother_name')); ?>">
        </div>

        <div>
          <label class="block mb-1">تاريخ الميلاد</label>
          <input name="birth_date" type="date" class="w-full border p-2 rounded" value="<?php echo e(old('birth_date')); ?>">
        </div>

        <div>
          <label class="block mb-1">مكان الميلاد - الولاية</label>
          <select name="birth_wilaya_id" class="w-full border p-2 rounded">
            <option value="">اختر</option>
            <?php $__currentLoopData = $wilayas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($w->id); ?>"><?php echo e($w->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div>
          <label class="block mb-1">اسم الولاية التي تنتمي إليها (للمكتب الولائي)</label>
          <select name="wilaya_id" class="w-full border p-2 rounded">
            <option value="">اختر</option>
            <?php $__currentLoopData = $wilayas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($w->id); ?>"><?php echo e($w->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div>
          <label class="block mb-1">رقم بطاقة التعريف الوطنية</label>
          <input name="national_id" class="w-full border p-2 rounded" value="<?php echo e(old('national_id')); ?>">
        </div>

        <div>
          <label class="block mb-1">رقم بطاقة الناخب</label>
          <input name="voter_id" class="w-full border p-2 rounded" value="<?php echo e(old('voter_id')); ?>">
        </div>

        <div>
          <label class="block mb-1">الهاتف</label>
          <input name="phone" class="w-full border p-2 rounded" value="<?php echo e(old('phone', auth()->user()->phone)); ?>">
        </div>

        <div>
          <label class="block mb-1">البريد الإلكتروني</label>
          <input name="email" class="w-full border p-2 rounded" value="<?php echo e(old('email', auth()->user()->email)); ?>">
        </div>

        <div>
          <label class="block mb-1">الصورة الشخصية</label>
          <input name="photo" type="file" class="w-full border p-2 rounded">
        </div>

        <div>
          <label class="block mb-1">صورة بطاقة التعريف</label>
          <input name="id_card_image" type="file" class="w-full border p-2 rounded">
        </div>

        <div class="col-span-2">
          <label class="block mb-1">الوظيفة</label>
          <input name="job" class="w-full border p-2 rounded" value="<?php echo e(old('job')); ?>">
        </div>
      </div>

      <div class="mt-4">
        <button class="py-2 px-4 rounded btn-primary">حفظ ومتابعة</button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\labo\Desktop\nahda-platform\resources\views/auth/complete-profile.blade.php ENDPATH**/ ?>