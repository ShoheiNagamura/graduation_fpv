<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
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
        'portfolio_url',
    ];

    // ポートフォリオを全て取得
    public static function getAllPilot()
    {
        // return self::orderBy('updated_at', 'desc')->get();
        return Portfolio::with('pilot')->orderBy('created_at', 'desc');
    }


    // 多対1
    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }



    // いいね機能リレーション 多対多
    public function portfolio_likes()
    {
        return $this->belongsToMany(Role::class, ' portfolio_likes', ' portfolio_id', 'user_id')->withTimestamps();
    }
}
