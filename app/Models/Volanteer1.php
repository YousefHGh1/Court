<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volanteer1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'volanteer_id', 'volanteer_type','volanteer_duration',  'circle','section','division','named',
        'volanteer_start_date','volanteer_end_date', 'file'];
 
         public function Volanteer()
         {
             return $this->belongsTo(Volanteer::class);
         }
}