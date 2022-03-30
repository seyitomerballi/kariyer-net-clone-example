<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;

    public static $way_of_working_list = [
        1 => 'Sürekli / Tam zamanlı',
        2 => 'Dönemsel / Proje bazlı',
        3 => 'Stajyer',
        4 => 'Yarı zamanlı / Part Time',
        5 => 'Serbest Zamanlı',
    ];
    public static $working_type_list = [
        1 => 'İş Yerinde',
        2 => 'Uzaktan / Remote',
        3 => 'Hybrid',
    ];
    public static $position_level_list = [
        1 => 'Muhasebe Uzmanı',
        2 => 'Satış Danışmanı',
        3 => 'Müşteri Temsilcisi',
        4 => 'Satış Temsilcisi',
        5 => 'Yazılım Uzmanı',
        6 => 'Muhasebe Elemanı',
        7 => 'Yazılım Geliştirme Uzmanı',
        8 => 'Mağaza Müdürü',
    ];

    public static $education_level_list = [
        1 => 'Doktora - Mezun',
        2 => 'Doktora - Öğrenci',
        3 => 'Yüksek Lisans - Mezun',
        4 => 'Yüksek Lisans - Öğrenci',
        5 => 'Üniversite - Mezun',
        6 => 'Üniversite - Öğrenci',
        7 => 'Meslek Yüksekokulu - Mezun',
        8 => 'Meslek Yüksekokulu - Öğrenci',
        9 => 'Lise - Mezun',
        10 => 'Lise - Öğrenci',
        11 => 'İlköğretim - Mezun',
        12 => 'İlköğretim - Öğrenci',
    ];

    public static $experienced_list = [
        1 => 'Deneyimli',
        2 => 'Deneyimsiz',
    ];

    public static $disability_list = [
        1 => 'Engelsiz',
        2 => 'Engelli',
    ];

    public static $driving_licence_list = [
        1 => 'A1',
        2 => 'A2',
        3 => 'A',
        4 => 'B1',
        5 => 'B',
        6 => 'BE',
        7 => 'C1',
        8 => 'C1E',
        9 => 'C',
        10 => 'CE',
        11 => 'D1',
        12 => 'D1E',
        13 => 'D',
        14 => 'DE',
        15 => 'F',
        16 => 'G',
    ];

    protected $table = 'advertisements';

    public function employer_user()
    {
        return $this->hasOne(EmployerUser::class, 'id', 'employer_user_id');
    }

    public function driving_licenses(){
        return $this->hasMany(DrivingLicense::class);
    }

    public function getPublicationDateAttrAttribute()
    {
        return Carbon::parse($this->attributes['publication_date'])->format('d/m/Y');
    }

    public function getLastPublishedDateAttrAttribute()
    {
        $publication_date = Carbon::createFromFormat('Y-m-d H:s:i',$this->attributes['publication_date']);
        $finished_date = Carbon::createFromFormat('Y-m-d H:s:i', $publication_date->addDays($this->attributes['period']));
        $now = Carbon::now();
        return $now->diffInDays($finished_date);
    }

    public function getOnPublicationAttrAttribute(){
        return $this->attributes['on_publication'] ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Pasif</span>';
    }
}
