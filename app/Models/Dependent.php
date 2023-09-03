<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable = [
       'employee_id','dependent_name', 'id_dependent', 'dependent_birth',
        'dependent_gender', 'dependent_file', 'relative_relation',  'dependent_address', 'notes'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // 
}