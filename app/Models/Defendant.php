<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defendant extends Model
{
    use HasFactory;

    protected $fillable = ['court_id', 'idno_defendant', 'defendant'];

    public function Court()
    {
        return $this->belongsTo(Court::class);
    }

    
}