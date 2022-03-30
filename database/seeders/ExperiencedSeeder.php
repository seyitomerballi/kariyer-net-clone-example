<?php

namespace Database\Seeders;

use App\Models\Experienced;
use Illuminate\Database\Seeder;

class ExperiencedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Deneyimli'],
            ['id' => 2, 'title' => 'Deneyimsiz'],
        ];

        Experienced::insert($data);
    }
}
