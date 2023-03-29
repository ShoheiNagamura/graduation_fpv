<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferencePlan extends Model
{
    use HasFactory;

    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }


    protected $fillable = [
        'plan_name',
        'plan_fee',
    ];
}
