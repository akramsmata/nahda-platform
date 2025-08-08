<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WilayaModel;

class WilayasSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'أدرار','الشلف','الأغواط','أم البواقي' // أضف باقي الولايات حسب الحاجة
        ];

        foreach ($names as $n) {
            WilayaModel::firstOrCreate(['name' => $n]);
        }
    }
}
