<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>لوحة مكتب الولاية – منصة حركة النهضة</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Cairo',sans-serif;}</style>
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-green-600 text-white p-4 text-center text-xl font-bold">لوحة مكتب الولاية</header>

<div class="max-w-7xl mx-auto p-6">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">أعضاء ولاية <span class="text-green-700">[اسم الولاية]</span></h2>
    <div class="space-x-2 rtl:space-x-reverse">
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">إضافة عضو</button>
      <button onclick="exportToCSV()" class="bg-blue-600 text-white px-4 py-2 rounded">تصدير Excel</button>
    </div>
  </div>

  <div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full">
      <thead class="bg-green-600 text-white">
        <tr>
          <th class="p-3 text-right">الاسم</th>
          <th class="p-3">البلدية</th>
          <th class="p-3">الهاتف</th>
          <th class="p-3">الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        <!-- محتوى ديناميكي -->
        <tr class="border-b">
          <td class="p-3 text-right">مصطفى بن علي</td>
          <td class="p-3">بلدية الأم</td>
          <td class="p-3">+213 6XX XXX XXX</td>
          <td class="p-3">
            <button class="px-3 py-1 bg-yellow-400 rounded">تعديل</button>
            <button class="px-3 py-1 bg-red-500 text-white rounded">حذف</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script>
function exportToCSV(){
  alert('وظيفة التصدير ستكون مفعّلة عبر الخادم لاحقاً.');
}
</script>

</body>
</html>
