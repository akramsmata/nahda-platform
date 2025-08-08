@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">
  <h1 class="text-2xl font-bold mb-3">{{ $activity->title }}</h1>
  <p class="text-sm text-gray-700 mb-4">{{ $activity->description }}</p>
  <p class="text-xs mb-4">المكان: {{ $activity->location }}</p>
  <p class="text-xs mb-4">الوقت: {{ $activity->starts_at?->format('Y-m-d H:i') }}</p>

  @auth
    <form method="post" action="{{ route('activities.register',$activity->id) }}">
      @csrf
      <button class="bg-green-600 text-white px-4 py-2 rounded">سجّل في هذا النشاط</button>
    </form>
  @else
    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded">سجل الدخول لتسجيل المشاركة</a>
  @endauth
</div>
@endsection
