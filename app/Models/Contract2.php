<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id', 'contract_type', 'contract_value', 'contract_start_date', 'contract_end_date',
        'operator', 'workplace', 'circle', 'section', 'division', 'named', 'file'
    ];

    public function Contract1()
    {
        return $this->belongsTo(Contract1::class);
    }
    
}