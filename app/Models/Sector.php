<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    public static $sector_list = [
        1 => 'Bilişim',
        2 => 'Üretim / Endüstriyel Ürünler',
        3 => 'Elektrik & Elektronik',
        4 => 'Güvenlik',
        5 => 'Enerji',
        6 => 'Gıda',
        7 => 'Kimya',
        8 => 'Maden ve Metal Sanayi',
        9 => 'Mobilya & Aksesuar',
        10 => 'Ev Eşyaları',
        11 => 'Orman Ürünleri',
        12 => 'Ofis / Büro Malzemeleri',
        13 => 'Otomotiv',
        14 => 'Sağlık',
        15 => 'Tarım / Ziraat',
        16 => 'Taşımacılık',
        17 => 'Tekstil',
        18 => 'Telekomünikasyon',
        19 => 'Turizm',
        20 => 'Topluluklar',
        21 => 'Diğer',
    ];
}
