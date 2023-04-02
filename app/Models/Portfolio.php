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

    // 多対1
    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }
}
