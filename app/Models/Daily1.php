<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily1 extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'daily_id', 'daily_fare','monthly_fare', 'work_start_date','work_end_date'
        , 'circle','section','division','named','kara',
         'file'];
 
         public function Daily()
         {
             return $this->belongsTo(Daily::class);
         }
}
