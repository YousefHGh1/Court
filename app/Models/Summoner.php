<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summoner extends Model
{
    use HasFactory;
    
    protected $fillable = ['court_id', 'idno_summoner', 'summoner'];

    public function Court()
    {
        return $this->belongsTo(Court::class);
    }
    
}