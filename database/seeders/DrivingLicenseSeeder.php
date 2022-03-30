<?php

namespace Database\Seeders;

use App\Models\DrivingLicense;
use Illuminate\Database\Seeder;

class DrivingLicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'A1'],
            ['id' => 2, 'title' => 'A2'],
            ['id' => 3, 'title' => 'A'],
            ['id' => 4, 'title' => 'B1'],
            ['id' => 5, 'title' => 'B'],
            ['id' => 6, 'title' => 'BE'],
            ['id' => 7, 'title' => 'C1'],
            ['id' => 8, 'title' => 'C1E'],
            ['id' => 9, 'title' => 'C'],
            ['id' => 10, 'title' => 'CE'],
            ['id' => 11, 'title' => 'D1'],
            ['id' => 12, 'title' => 'D1E'],
            ['id' => 13, 'title' => 'D'],
            ['id' => 14, 'title' => 'DE'],
            ['id' => 15, 'title' => 'F'],
            ['id' => 16, 'title' => 'G'],
        ];

        DrivingLicense::insert($data);
    }
}
