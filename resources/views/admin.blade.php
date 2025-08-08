<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>لوحة التحكم الوطنية – منصة حركة النهضة</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Cairo',sans-serif;}</style>
</head>
<body class="bg-gray-100 min-h-screen flex">

<!-- Sidebar -->
<aside class="w-64 bg-green-800 text-white p-6 flex-shrink-0">
  <div class="flex flex-col items-center mb-6">
    <img src="{{ asset('logo/log.png') }}" alt="شعار" class="w-20 h-20 rounded-full object-cover shadow mb-2">
    <div class="text-lg font-bold">المشرف الوطني</div>
  </div>

  <nav class="mt-4 space-y-2">
    <a href="#" class="block py-2 px-3 rounded hover:bg-green-700">الأعضاء</a>
    <a href="#" class="block py-2 px-3 rounded hover:bg-green-700">المكاتب الولائية</a>
    <a href="#" class="block py-2 px-3 rounded hover:bg-green-700">الصحفيين</a>
    <a href="#" class="block py-2 px-3 rounded hover:bg-green-700">الإحصائيات</a>
    <a href="#" class="block py-2 px-3 rounded hover:bg-green-700">التقارير</a>
  </nav>

  <form method="POST" action="{{ route('logout') }}" class="mt-auto">
    @csrf
    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded mt-6">تسجيل الخروج</button>
  </form>
</aside>

<!-- main content -->
<main class="flex-1 p-6">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-green-800">لوحة التحكم الوطنية</h1>
    <div class="space-x-2 rtl:space-x-reverse">
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">إنشاء مستخدم</button>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">تصدير</button>
    </div>
  </div>

  <!-- إحصائيات -->
  <div class="grid md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow">
      <div class="text-3xl font-bold text-green-700">15,000</div>
      <div class="text-sm text-gray-600">أعضاء</div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <div class="text-3xl font-bold text-green-700">58</div>
      <div class="text-sm text-gray-600">مكاتب ولائية</div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <div class="text-3xl font-bold text-green-700">120</div>
      <div class="text-sm text-gray-600">صحفي</div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <div class="text-3xl font-bold text-green-700">300</div>
      <div class="text-sm text-gray-600">اجتماعات</div>
    </div>
  </div>

  <!-- جدول الأعضاء -->
  <div class="bg-white rounded-xl shadow p-4">
    <h2 class="text-xl font-bold mb-4">قائمة الأعضاء</h2>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-green-600 text-white">
          <tr>
            <th class="p-3 text-right">الاسم</th>
            <th class="p-3">الولاية</th>
            <th class="p-3">الدور</th>
            <th class="p-3">الإجراءات</th>
          </tr>
        </thead>
        <tbody>
          <!-- سيملأ ديناميكياً من قاعدة البيانات لاحقاً -->
          <tr class="border-b">
            <td class="p-3 text-right">أحمد بن محمد</td>
            <td class="p-3">الجزائر</td>
            <td class="p-3">عضو</td>
            <td class="p-3">
              <button class="px-3 py-1 bg-yellow-400 rounded">تعديل</button>
              <button class="px-3 py-1 bg-red-500 text-white rounded">حذف</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
</body>
</html>
