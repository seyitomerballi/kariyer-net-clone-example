<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EmployeeUser extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    public static $military_status_list = [
        1 => 'Muaf',
        2 => 'Yapıldı',
        3 => 'Tecilli',
        4 => 'Yapılıyor',
        5 => 'Yapılmadı',
    ];
    protected $table = 'employee_user';
    protected $guard = 'employee_user';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_number',
        'password'
    ];
    protected $hidden = ['password', 'remember_token'];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
