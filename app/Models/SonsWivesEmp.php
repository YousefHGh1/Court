<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SonsWivesEmp extends Model
{
    use HasFactory;
    
                    
    protected $fillable = [
        'employee_id', 'wife_name', 'id_wife', 'wife_birth', 'date_marriage',
         'wife_file', 'wife_job', 'id_son','son_name','son_satuts',
         'son_file', 'son_birth','son_job', 'son_gender','son_unv','son_unv_name','son_major','son_study_start','son_unv_file'];
 
         public function Employee()
         {
             return $this->belongsTo(Employee::class);
         }
}