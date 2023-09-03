<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volanteer extends Model
{
    use HasFactory; 

    protected $fillable = [
        'id_volanteer', 'volanteer_email', 'volanteer_name', 'volanteer_gender',
        'volanteer_status', 'volanteer_address', 'volanteer_mobile',
        'volanteer_birthdate', 'volanteer_degree', 'volanteer_major','volanteer_graduation'];

        public function Volanteer1s()
        {
            return $this->hasMany(Volanteer1::class);
        }

        
        public function get_type()
        {
            return $this->Volanteer1s()->value('volanteer_type');
        }
        

    public function getVolunteerVolanteer1s()
    {
        return $this->Volanteer1s()->where('volanteer_type', 'تطوع')->get();
    }
}