<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;




    // いいね機能リレーション 多対多
    public function pilot_likes()
    {
        return $this->belongsToMany(Role::class, 'pilot_likes', 'user_id', 'pilot_id')->withTimestamps();
    }

    // チャット機能リレーション 多対多
    public function user_chats()
    {
        return $this->belongsToMany(Role::class, 'user_chats', 'user_id', 'pilot_id')->withTimestamps();
    }

    // 受注管理機能リレーション 多対多
    public function pilot_orders()
    {
        return $this->belongsToMany(Role::class, 'pilot_orders', 'user_id', 'shooting_plan_id')->withTimestamps();
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
