<?php

namespace Database\Seeders;

use App\Models\Disability;
use Illuminate\Database\Seeder;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Engelsiz'],
            ['id' => 2, 'title' => 'Engelli'],
        ];

        Disability::insert($data);
    }
}
