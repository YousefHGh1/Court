<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_contract', 'contract_num', 'contract_name', 'contract_email',
        'contract_gender', 'contract_status', 'contract_address',
        'contract_mobile', 'contract_birthdate', 'contract_degree', 'contract_son', 'contract_wife'
    ];

    public function Contract2s()
    {
        return $this->hasMany(Contract2::class, 'contract_id', 'id');
    }

    // نوع التعيين
    public function get_contract_type()
    {
        return $this->Contract2s()->value('contract_type');
    }
}