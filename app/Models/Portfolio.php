<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;


    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }



    protected $fillable = [
        'portfolio_url',
    ];
}
