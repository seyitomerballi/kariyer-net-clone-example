<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeUserWorkExperience extends Model
{
    use HasFactory;

    public static $company_sector_list = [

        1 => 'Tekstil',
        2 => 'Hizmet',
        3 => 'Gıda',
        4 => 'Yapı',
        5 => 'Sağlık',
        6 => 'Eğitim',
        7 => 'Otomotiv',
        8 => 'Turizm',
        9 => 'Bilişim',
        10 => 'Finans - Ekonomi',
    ];
    public static $business_area_list = [
        1 => 'Satış',
        2 => 'Pazarlama',
        3 => 'Akademik',
        4 => 'Analiz/Araştırma',
        5 => 'AR-GE',
        6 => 'Arşiv/Dokümantasyon',
        7 => 'Bakım/Onarım',
        8 => 'Bilgi İşlem',
        9 => 'Bilgi Teknolojileri/IT',
        10 => 'Borsa',
        11 => 'Borsa Finans',
        12 => 'Bireysel Portföy Yönetimi Hizmetleri',
        13 => 'Denetim/Teftiş',
        14 => 'Depo/Antrepo',
        15 => 'Dış Denetim',
        16 => 'Dış İlişkiler',
        17 => 'Diğer',
        18 => 'Dijital Pazarlama',
        19 => 'Eğitim',
        20 => 'E-Ticaret',
        21 => 'Finans',
        22 => 'Garyimenkul Değerleme',
        23 => 'Genel Başvuru',
        24 => 'Haberleşme',
        25 => 'Halkla İlişkiler',
        26 => 'Hazine ve Sabit Getirili Menkul Değerler',
        27 => 'Hizmet',
        28 => 'Hukuk',
        29 => 'İç Denetim',
        30 => 'İdari İşler',
        31 => 'İnsan Kaynakları',
        32 => 'İş Geliştirme',
        33 => 'İş Sağlığı ve Güvenliği',
        34 => 'İthalat/İhracat',
        35 => 'Kredi',
        36 => 'Kalite',
        37 => 'Kurumsal Finansman',
        38 => 'Lojistik',
        39 => 'Mimarlık',
        40 => 'Muhasebe',
        41 => 'Mühendislik',
        42 => 'Müşteri Hizmetleri',
        43 => 'Müşteri Hizmetleri/Çağrı Merkezi',
        44 => 'Müşteri İlişkileri',
        45 => 'Nakliye',
        46 => 'Operasyon',
        47 => 'Organizasyon',
        48 => 'Ön Büro',
        49 => 'Parça',
        50 => 'Pazar Araştırma',
        51 => 'Yönetim',
        52 => 'Turizm',
        53 => 'Ulaştırma',
        54 => 'Yiyecek İçecek',
        55 => 'Yönetim',
    ];

    public static $working_type_list = [

        1 => 'Serbest Zamanlı',
        2 => 'Yarı Zamanlı',
        3 => 'Dönemsel',
        4 => 'Stajyer',
        5 => 'Tam Zamanlı',
        6 => 'Gönüllü',
    ];
    protected $table = 'employee_user_work_experiences';
}
