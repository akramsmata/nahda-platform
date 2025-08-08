@extends('layouts.app') {{-- إن لم يكن لديك layouts، استبدل بالرأس والذيل من home.blade --}}

@section('content')
<div class="max-w-6xl mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6">النشاطات</h1>

  <div class="grid md:grid-cols-2 gap-6">
    @foreach($activities as $a)
      <div class="bg-white rounded shadow p-4">
        <h3 class="font-semibold">{{ $a->title }}</h3>
        <p class="text-sm text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit($a->description,120) }}</p>
        <p class="text-xs text-gray-500">يبدأ: {{ $a->starts_at?->format('Y-m-d H:i') }}</p>
        <div class="mt-3">
          <a href="{{ route('activities.show',$a->id) }}" class="text-blue-600">تفاصيل & تسجيل</a>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-6">{{ $activities->links() }}</div>
</div>
@endsection
