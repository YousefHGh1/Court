<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
    use HasFactory;

    protected $fillable = [ 'employee_id', 'id_wife','wife_name', 'wife_birth', 'date_marriage', 'wife_job','wife_file'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
    

    protected $table = 'wives';

}