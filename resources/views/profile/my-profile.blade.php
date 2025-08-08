@extends('layouts.app')

@section('title','ملفي الشخصي')

@section('content')
<div class="max-w-3xl mx-auto mt-12">
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">ملفي الشخصي</h2>

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '/logo/logo.jpg' }}" class="h-44 w-44 object-cover rounded shadow">
      </div>
      <div>
        <p><strong>الاسم:</strong> {{ auth()->user()->name }}</p>
        <p><strong>البريد:</strong> {{ auth()->user()->email }}</p>
        <p><strong>الهاتف:</strong> {{ auth()->user()->phone }}</p>
        <p><strong>الدور:</strong> {{ auth()->user()->affiliation_office ?? '---' }}</p>
        <p><strong>حالة الموافقة:</strong> {{ auth()->user()->approval_status }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
