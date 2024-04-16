@php
    use App\Enums\PaymentMethod;use App\Models\Subscription;
    $totalRevenue = Subscription::where('payment_method', PaymentMethod::CASH)
              ->sum('price');
    $totalRevenueCard = Subscription::where('payment_method', PaymentMethod::CARD)
            ->sum('price_dollar');

@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management Report</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <style>
        body {
            width: 22cm;
            text-align: justify;
            text-rendering: geometricPrecision;
        }
    </style>
</head>
<body class="p-8" style="font-family: 'Cairo', sans-serif;">
<div class="max-w-3xl mx-auto  p-8 rounded shadow flex flex-col justify-start">
    <h1 class="text-2xl font-bold mb-4 " style="text-align: center">تقرير عن الصالة</h1>
    <div></div>
    <div class="grid grid-cols-2 gap-4 mt-5 justify-end place-content-end" style="text-align: center;">
        <div class="block text-end">
            <h2 class="text-lg font-semibold mb-2 text-end">الأرباح الكلية بالدينار</h2>
            <p class="text-gray-700">{{ $totalRevenue . ' LYD' }}</p>
        </div>
        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">الأرباح الكلية بالدولار</h2>
            <p class="text-gray-700">{{ $totalRevenueCard . ' USD' }}</p>
        </div>
        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">عدد الاشتراكات</h2>
            <p class="text-gray-700">{{ Subscription::count() }}</p>
        </div>
        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">عدد المتدربين</h2>
            <p class="text-gray-700">{{ \App\Models\Trainee::count() }}</p>
        </div>
        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">عدد المدربين</h2>
            <p class="text-gray-700">{{ \App\Models\Coach::count() }}</p> <!-- Replace XX with actual number of coaches -->
        </div>
        <div class="mt-4">
            <h2 class="text-lg font-semibold mb-2">عدد المشرفين</h2>
            <p class="text-gray-700">{{ \App\Models\User::where('type', \App\Enums\UserType::Admin)->count() }}</p> <!-- Replace XX with actual number of coaches -->
        </div>
    </div>
</div>
</body>
</html>
