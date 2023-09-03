<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Son extends Model
{
    use HasFactory;

    protected $fillable = [ 'employee_id','id_son', 'son_name', 'son_satuts','son_gender',
        'son_birth', 'son_job',  'son_unv',  'son_file','son_unv_name', 'son_major', 'son_study_start', 'son_unv_file'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}