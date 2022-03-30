<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'title' => 'Akademik'],
            ['id' => 2, 'title' => 'AR-GE'],
            ['id' => 3, 'title' => 'Arşiv/Dokümantasyon'],
            ['id' => 4, 'title' => 'Bakım/Onarım'],
            ['id' => 5, 'title' => 'Bilgi İşlem'],
            ['id' => 6, 'title' => 'Depo/Antrepo'],
            ['id' => 7, 'title' => 'Eğitim'],
            ['id' => 8, 'title' => 'Genel Başvuru'],
            ['id' => 9, 'title' => 'Güvenlik'],
            ['id' => 10, 'title' => 'Haberleşme'],
            ['id' => 11, 'title' => 'Halkla İlişkiler'],
            ['id' => 12, 'title' => 'Hizmet'],
            ['id' => 13, 'title' => 'Hukuk'],
            ['id' => 14, 'title' => 'İdari İşler'],
            ['id' => 15, 'title' => 'İnsan Kaynakları'],
            ['id' => 16, 'title' => 'İş Geliştirme'],
            ['id' => 17, 'title' => 'İthalat/İhracat'],
            ['id' => 18, 'title' => 'Kalite'],
            ['id' => 19, 'title' => 'Lojistik'],
            ['id' => 20, 'title' => 'Mimarlık'],
            ['id' => 21, 'title' => 'Muhasebe'],
            ['id' => 22, 'title' => 'Mühendislik'],
            ['id' => 23, 'title' => 'Müşteri Hizmetleri/ÇağrıMerkezi'],
            ['id' => 24, 'title' => 'Müşteri İlişkileri'],
            ['id' => 25, 'title' => 'Mütercim Tercümanlık'],
            ['id' => 26, 'title' => 'Nakliye'],
            ['id' => 27, 'title' => 'Operasyon'],
            ['id' => 28, 'title' => 'Organizasyon'],
            ['id' => 29, 'title' => 'Pazar Araştırma'],
            ['id' => 30, 'title' => 'Pazarlama'],
            ['id' => 31, 'title' => 'Personel'],
            ['id' => 32, 'title' => 'Planlama'],
            ['id' => 33, 'title' => 'Reklam'],
            ['id' => 34, 'title' => 'Sağlık'],
            ['id' => 35, 'title' => 'Satınalma'],
            ['id' => 36, 'title' => 'Satış'],
            ['id' => 37, 'title' => 'Sekreterya'],
            ['id' => 38, 'title' => 'Spor'],
            ['id' => 39, 'title' => 'Tasarım/Grafik'],
            ['id' => 40, 'title' => 'Taşıma'],
            ['id' => 41, 'title' => 'Teknikerlik'],
            ['id' => 42, 'title' => 'Teknisyenlik'],
            ['id' => 43, 'title' => 'Turizm'],
            ['id' => 44, 'title' => 'Ulaştırma'],
            ['id' => 45, 'title' => 'Üretim/İmalat'],
            ['id' => 46, 'title' => 'Yönetim'],
            ['id' => 47, 'title' => 'Finans'],
            ['id' => 48, 'title' => 'Teknik'],
            ['id' => 49, 'title' => 'Denetim/Teftiş'],
            ['id' => 50, 'title' => 'Yiyecek ve İçecek'],
            ['id' => 51, 'title' => 'Kredi'],
            ['id' => 52, 'title' => 'Sigorta'],
            ['id' => 53, 'title' => 'Ruhsatlandırma'],
            ['id' => 54, 'title' => 'Program'],
            ['id' => 55, 'title' => 'Teknoloji'],
            ['id' => 56, 'title' => 'Dış İlişkiler'],
            ['id' => 57, 'title' => 'Tedarik Yönetimi'],
            ['id' => 58, 'title' => 'Sistem'],
            ['id' => 59, 'title' => 'Risk Yönetimi'],
            ['id' => 60, 'title' => 'Diğer'],
            ['id' => 61, 'title' => 'Analiz/Araştırma'],
            ['id' => 62, 'title' => 'Bireysel Portföy Yönetimi Hizmetleri'],
            ['id' => 63, 'title' => 'Borsa'],
            ['id' => 64, 'title' => 'Borsa Finans'],
            ['id' => 65, 'title' => 'Dış Denetim'],
            ['id' => 66, 'title' => 'Hazineve Sabit Getirili Menkul Değerler'],
            ['id' => 67, 'title' => 'İç Denetim'],
            ['id' => 68, 'title' => 'Kurumsal Finansman'],
            ['id' => 69, 'title' => 'Uluslararası Sermaye Piyasaları'],
            ['id' => 70, 'title' => 'Varlık Yönetimi'],
            ['id' => 71, 'title' => 'Yurtiçi Sermaye Piyasaları'],
            ['id' => 72, 'title' => 'Gayrimenkul Değerleme'],
            ['id' => 73, 'title' => 'Ön Büro'],
            ['id' => 74, 'title' => 'Satış ve Pazarlama'],
            ['id' => 75, 'title' => 'Bilgi Teknolojileri/IT'],
            ['id' => 76, 'title' => 'TeknikServis'],
            ['id' => 77, 'title' => 'Pazarlama Teknolojileri'],
            ['id' => 78, 'title' => 'Dijital Pazarlama'],
            ['id' => 79, 'title' => 'İş Sağlığı ve Güvenliği'],
            ['id' => 80, 'title' => 'Parça'],
            ['id' => 81, 'title' => 'Müşteri Hizmetleri'],
            ['id' => 82, 'title' => 'Satış Geliştirme'],
            ['id' => 83, 'title' => 'E-Ticaret'],
        ];

        Department::insert($data);
    }
}
