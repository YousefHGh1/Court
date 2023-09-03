<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    // protected $fillable = ['idno_summoner', 'summoner','idno_defendant', 'defendant', 'address', 'jibaya_id','amount'];

    protected $fillable = ['jibaya_id', 'amount', 'address','action_type'];

    public function defendants()
    {
        return $this->hasMany(Defendant::class);
    }

    public function summoners()
    {
        return $this->hasMany(Summoner::class);
    }

    public function get_summoners()
    {
        return $this->summoners()->value('summoner');
    }
    public function get_defendants()
    {
        return $this->defendants()->value('defendant');
    }
    public function get_idno_summoners()
    {
        return $this->summoners()->value('idno_summoner');
    }
    public function get_idno_defendants()
    {
        return $this->defendants()->value('idno_defendant');
    }

}