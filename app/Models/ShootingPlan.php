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
}
