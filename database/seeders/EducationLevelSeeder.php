<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Doktora - Mezun'],
            ['id' => 2, 'title' => 'Doktora - Öğrenci'],
            ['id' => 3, 'title' => 'Yüksek Lisans - Mezun'],
            ['id' => 4, 'title' => 'Yüksek Lisans - Öğrenci'],
            ['id' => 5, 'title' => 'Üniversite - Mezun'],
            ['id' => 6, 'title' => 'Üniversite - Öğrenci'],
            ['id' => 7, 'title' => 'Meslek Yüksekokulu - Mezun'],
            ['id' => 8, 'title' => 'Meslek Yüksekokulu - Öğrenci'],
            ['id' => 9, 'title' => 'Lise - Mezun'],
            ['id' => 10, 'title' => 'Lise - Öğrenci'],
            ['id' => 11, 'title' => 'İlköğretim - Mezun'],
            ['id' => 12, 'title' => 'İlköğretim - Öğrenci'],
        ];

        EducationLevel::insert($data);
    }
}
