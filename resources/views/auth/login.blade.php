@extends('layouts.app')

@section('title','تسجيل الدخول')

@section('content')
<div class="max-w-md mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">تسجيل الدخول</h2>

    @if($errors->any())
      <div class="bg-red-50 text-red-700 p-3 rounded mb-3">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('login.submit') }}" method="post">
      @csrf
      <label class="block mb-1">البريد الإلكتروني</label>
      <input name="email" type="email" required class="w-full border p-2 rounded mb-3" value="{{ old('email') }}">

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
@endsection
