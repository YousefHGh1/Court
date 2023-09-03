<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_daily', 'daily_name', 'daily_gender', 'daily_status',
        'daily_address', 'daily_mobile', 'daily_birthdate',
        'daily_degree'];

        public function Daily1s()
        {
            return $this->hasMany(Daily1::class);
        }


            // نوع التعيين
    public function get_named()
    {
        return $this->Daily1s()->value('named');
    }
    
}