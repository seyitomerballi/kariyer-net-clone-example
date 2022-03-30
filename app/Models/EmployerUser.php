<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EmployerUser extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $table = 'employer_user';
    protected $guard = 'employer_user';
    protected $fillable = [
        'name','surname','email','password','phone_number','company_name',
        'country','district','district'
    ];
    protected $hidden = ['password','remember_token'];
}
