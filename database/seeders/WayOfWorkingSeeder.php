<?php

namespace Database\Seeders;

use App\Models\WayOfWorking;
use Illuminate\Database\Seeder;

class WayOfWorkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Sürekli / Tam zamanlı'],
            ['id' => 2, 'title' => 'Dönemsel / Proje bazlı'],
            ['id' => 3, 'title' => 'Stajyer'],
            ['id' => 4, 'title' => 'Yarı zamanlı / Part Time'],
            ['id' => 5, 'title' => 'Serbest Zamanlı'],
        ];
        WayOfWorking::insert($data);
    }
}
