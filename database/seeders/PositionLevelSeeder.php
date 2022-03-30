<?php

namespace Database\Seeders;

use App\Models\PositionLevel;
use Illuminate\Database\Seeder;

class PositionLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Muhasebe Uzmanı'],
            ['id' => 2, 'title' => 'Satış Danışmanı'],
            ['id' => 3, 'title' => 'Müşteri Temsilcisi'],
            ['id' => 4, 'title' => 'Satış Temsilcisi'],
            ['id' => 5, 'title' => 'Yazılım Uzmanı'],
            ['id' => 6, 'title' => 'Muhasebe Elemanı'],
            ['id' => 7, 'title' => 'Yazılım Geliştirme Uzmanı'],
            ['id' => 8, 'title' => 'Mağaza Müdürü'],
        ];

        PositionLevel::insert($data);
    }
}
