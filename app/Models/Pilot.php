<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PilotResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pilot extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // 1対多
    public function pilotPortfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    // 1対多
    public function pilotReferencePlans()
    {
        return $this->hasMany(ReferencePlan::class);
    }

    // 1対多
    public function pilotShootingPlans()
    {
        return $this->hasMany(ShootingPlan::class);
    }


    // チャット機能リレーション 多対多
    public function user_chats()
    {
        return $this->belongsToMany(Role::class, 'user_chats', 'pilot_id', 'user_id')->withTimestamps();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //  変更可能
    protected $fillable = [
        'name',
        'email',
        'user_image',
        'age',
        'work_area',
        'message_pr',
        'achievement',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
