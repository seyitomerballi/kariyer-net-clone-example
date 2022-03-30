<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementAppeal extends Model
{
    use HasFactory;

    public function advertisement()
    {
        return $this->belongsTo(Advertisements::class);
    }

    public function employee_user()
    {
        return $this->belongsTo(EmployeeUser::class);
    }

    public function getPublicationDateAttrAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getAppealDateAttrAttribute()
    {
        return Carbon::parse($this->attributes['appeal_date'])->format('d/m/Y');
    }
}
