<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | منصة حركة النهضة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-[Cairo] min-h-screen flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl text-center">
        <img src="/logo/logo.png" alt="شعار" class="h-24 mx-auto mb-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">مرحبًا بك في منصة حركة النهضة</h1>
        <p class="text-gray-600 mb-6">لقد سجلت الدخول بنجاح، يمكنك الآن إدارة حسابك ومعلوماتك.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">
                تسجيل الخروج
            </button>
        </form>
    </div>
</body>
</html>
