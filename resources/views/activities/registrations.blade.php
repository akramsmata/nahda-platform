@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
  <h1 class="text-2xl font-bold mb-6">طلبات التسجيل في النشاطات</h1>

  @foreach($regs as $r)
    <div class="bg-white p-4 rounded shadow mb-3">
      <div class="flex justify-between">
        <div>
          <div class="font-semibold">{{ $r->user?->name ?? 'مستخدم غير مسجل' }}</div>
          <div class="text-sm text-gray-600">{{ $r->activity->title ?? '' }}</div>
          <div class="text-xs text-gray-500">الحالة: {{ $r->status }} - الحضور: {{ $r->attended ? 'مؤكد' : 'غير مؤكد' }}</div>
        </div>
        <div class="space-x-2">
          <form action="{{ route('admin.registration.update', $r->id) }}" method="post" style="display:inline">
            @csrf
            <input type="hidden" name="action" value="accept">
            <button class="px-3 py-1 bg-green-600 text-white rounded">قبول</button>
          </form>

          <form action="{{ route('admin.registration.update', $r->id) }}" method="post" style="display:inline">
            @csrf
            <input type="hidden" name="action" value="reject">
            <button class="px-3 py-1 bg-red-500 text-white rounded">رفض</button>
          </form>

          <form action="{{ route('admin.registration.update', $r->id) }}" method="post" style="display:inline">
            @csrf
            <input type="hidden" name="action" value="toggle_attended">
            <button class="px-3 py-1 bg-indigo-600 text-white rounded">تأكيد الحضور</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach

  <div class="mt-6">{{ $regs->links() }}</div>
</div>
@endsection
