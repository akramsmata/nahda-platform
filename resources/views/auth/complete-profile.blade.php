@extends('layouts.app')

@section('title','إكمال الملف الشخصي')

@section('content')
<div class="max-w-2xl mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">إكمال الملف الشخصي</h2>

    <form action="{{ route('profile.complete.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1">اسم الأب</label>
          <input name="father_name" class="w-full border p-2 rounded" value="{{ old('father_name') }}">
        </div>
        <div>
          <label class="block mb-1">اسم الأم</label>
          <input name="mother_name" class="w-full border p-2 rounded" value="{{ old('mother_name') }}">
        </div>

        <div>
          <label class="block mb-1">تاريخ الميلاد</label>
          <input name="birth_date" type="date" class="w-full border p-2 rounded" value="{{ old('birth_date') }}">
        </div>

        <div>
          <label class="block mb-1">مكان الميلاد - الولاية</label>
          <select name="birth_wilaya_id" class="w-full border p-2 rounded">
            <option value="">اختر</option>
            @foreach($wilayas as $w)
              <option value="{{ $w->id }}">{{ $w->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block mb-1">اسم الولاية التي تنتمي إليها (للمكتب الولائي)</label>
          <select name="wilaya_id" class="w-full border p-2 rounded">
            <option value="">اختر</option>
            @foreach($wilayas as $w)
              <option value="{{ $w->id }}">{{ $w->name }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block mb-1">رقم بطاقة التعريف الوطنية</label>
          <input name="national_id" class="w-full border p-2 rounded" value="{{ old('national_id') }}">
        </div>

        <div>
          <label class="block mb-1">رقم بطاقة الناخب</label>
          <input name="voter_id" class="w-full border p-2 rounded" value="{{ old('voter_id') }}">
        </div>

        <div>
          <label class="block mb-1">الهاتف</label>
          <input name="phone" class="w-full border p-2 rounded" value="{{ old('phone', auth()->user()->phone) }}">
        </div>

        <div>
          <label class="block mb-1">البريد الإلكتروني</label>
          <input name="email" class="w-full border p-2 rounded" value="{{ old('email', auth()->user()->email) }}">
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
          <input name="job" class="w-full border p-2 rounded" value="{{ old('job') }}">
        </div>
      </div>

      <div class="mt-4">
        <button class="py-2 px-4 rounded btn-primary">حفظ ومتابعة</button>
      </div>
    </form>
  </div>
</div>
@endsection
