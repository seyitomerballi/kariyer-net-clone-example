<?php

namespace Database\Seeders;

use App\Models\WorkingType;
use Illuminate\Database\Seeder;

class WorkingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'İş Yerinde',],
            ['id' => 2, 'title' => 'Uzaktan / Remote',],
            ['id' => 3, 'title' => 'Hybrid',]
        ];
        WorkingType::insert($data);
    }
}
