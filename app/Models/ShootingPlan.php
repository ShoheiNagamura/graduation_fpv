<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShootingPlan extends Model
{
    use HasFactory;
    // 変更されない
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // 変更可能
    protected $fillable = [
        'pilot_id',
        'plan_name',
        'plan_detail',
        'plan_fee',
        'application_date',
        'shooting_date',
        'delivery_date'
    ];

    protected $attribute = [
        'application_date' => null,
    ];


    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    // 多対1
    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }


    // 受注管理機能リレーション 多対多
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
