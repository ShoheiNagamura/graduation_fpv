<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingPlan extends Model
{
    use HasFactory;

    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }


    protected $fillable = [
        'plan_name',
        'plan_detail',
        'plan_fee',
        'application_date',
        'shooting_date',
        'delivery_date'
    ];
}
