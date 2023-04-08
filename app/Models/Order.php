<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\ShootingPlan;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'shooting_plan_id',
        'user_id',
        'application_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function shootingPlan()
    {
        return $this->belongsTo(ShootingPlan::class);
    }
}
