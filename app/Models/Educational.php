<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educational extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'educational_org', 'degree', 'majors', 'address_org',
        'graduation', 'rate', 'rate_num', 'edu_file', 'training_file'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}