<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'حركة النهضة')</title>

  <!-- Tailwind (CDN سريع للتطوير) -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">

  <style>
    /* تصميمات وأنيميشنات بسيطة وجميلة */
    body { font-family: 'Tajawal', sans-serif; -webkit-font-smoothing:antialiased; }
    .hero-bg { background-image: url('/logo/bg.jpg'); background-size: cover; background-position: center; }
    .float-up { animation: floatUp 6s ease-in-out infinite; }
    @keyframes floatUp {
      0% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
      100% { transform: translateY(0); }
    }
    .fade-in-up { animation: fadeInUp 0.9s ease both; }
    @keyframes fadeInUp { from { opacity:0; transform: translateY(12px);} to { opacity:1; transform: translateY(0);} }

    /* زر جميل */
    .btn-primary { background: linear-gradient(90deg,#0ea5e9,#0369a1); color:white; }
  </style>

  @stack('styles')
</head>
<body class="bg-gray-50 min-h-screen">

  <nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <a href="{{ route('home') }}" class="flex items-center">
          <img src="/logo/logo.jpg" alt="لوغو" class="h-12 w-12 object-cover rounded-full shadow">
          <span class="mr-3 font-bold text-lg">حركة النهضة</span>
        </a>
      </div>

      <div class="flex items-center space-x-3">
        <a href="{{ route('activities.index') }}" class="text-sm text-gray-700">النشاطات</a>

        @guest
          <a href="{{ route('login') }}" class="px-3 py-1 rounded border">تسجيل الدخول</a>
          <a href="{{ route('register.show') }}" class="px-3 py-1 rounded btn-primary">إنشاء حساب</a>
        @else
          <a href="{{ route('profile.my') }}" class="px-3 py-1 rounded border">ملفي</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="px-3 py-1 rounded bg-red-600 text-white">خروج</button>
          </form>
        @endguest
      </div>
    </div>
  </nav>

  <main class="py-6">
    @if(session('success'))
      <div class="max-w-6xl mx-auto px-4">
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="mt-12 py-6 text-center text-sm text-gray-500">
    © {{ date('Y') }} حركة النهضة
  </footer>

  @stack('scripts')
</body>
</html>
