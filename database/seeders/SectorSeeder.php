<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Bilişim'],
            ['id' => 2, 'title' => 'Üretim / Endüstriyel Ürünler'],
            ['id' => 3, 'title' => 'Elektrik & Elektronik'],
            ['id' => 4, 'title' => 'Güvenlik'],
            ['id' => 5, 'title' => 'Enerji'],
            ['id' => 6, 'title' => 'Gıda'],
            ['id' => 7, 'title' => 'Kimya'],
            ['id' => 8, 'title' => 'Maden ve Metal Sanayi'],
            ['id' => 9, 'title' => 'Mobilya & Aksesuar'],
            ['id' => 10, 'title' => 'Ev Eşyaları'],
            ['id' => 11, 'title' => 'Orman Ürünleri'],
            ['id' => 12, 'title' => 'Ofis / Büro Malzemeleri'],
            ['id' => 13, 'title' => 'Otomotiv'],
            ['id' => 14, 'title' => 'Sağlık'],
            ['id' => 15, 'title' => 'Tarım / Ziraat'],
            ['id' => 16, 'title' => 'Taşımacılık'],
            ['id' => 17, 'title' => 'Tekstil'],
            ['id' => 18, 'title' => 'Telekomünikasyon'],
            ['id' => 19, 'title' => 'Turizm'],
            ['id' => 20, 'title' => 'Topluluklar'],
            ['id' => 21, 'title' => 'Diğer'],
        ];

        Sector::insert($data);
    }
}
