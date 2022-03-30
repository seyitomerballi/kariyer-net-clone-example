<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeUserEducationInformation extends Model
{
    use HasFactory;

    protected $table = 'employee_user_education_informations';

    public static $education_status_list = [
        1 => 'Lisans',
        2 => 'ÖnLisans',
        3 => 'Yüksek Lisans',
        4 => 'Doktora',
    ];

    public static $diploma_grading_system_list = [
        1 => '4',
        2 => '5',
        3 => '10',
        4 => '100',
    ];
}
