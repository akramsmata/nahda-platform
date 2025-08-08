<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل عضو جديد – منصة حركة النهضة</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Cairo',sans-serif;background:#f3f7f3;}</style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

  <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-lg">
    <h2 class="text-2xl font-bold text-green-800 mb-4 text-center">تسجيل حساب جديد</h2>

    <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-semibold mb-1">الاسم الكامل</label>
        <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-3 border rounded-xl">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">البريد الإلكتروني</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 border rounded-xl">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold mb-1">كلمة المرور</label>
          <input type="password" name="password" required class="w-full p-3 border rounded-xl">
          @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">تأكيد كلمة المرور</label>
          <input type="password" name="password_confirmation" required class="w-full p-3 border rounded-xl">
        </div>
      </div>

      <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-xl hover:bg-green-700">إنشاء الحساب</button>
    </form>

    <div class="text-center mt-4 text-sm">
      <a href="{{ route('login') }}" class="text-green-600 hover:underline">هل لديك حساب؟ تسجيل الدخول</a>
    </div>
  </div>
</body>
</html>
