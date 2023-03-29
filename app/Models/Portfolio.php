<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // 多対1
    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }



    protected $fillable = [
        'portfolio_url',
    ];
}
