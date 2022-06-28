<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;




class utente extends Model
{
    public $timestamps = false;
    protected $table = 'utente';
    protected $keyType='string';
    // protected $dateFormat='U';
    // protected $primaryKey = 'id';
    public $incrementing=false;
    
    // id       | nome    | cognome     | email| password | avatar| sesso | n_telefono | data_nascita | paese
    // protected $fillable = ['id',]
    public function post()
    {
        return $this->hasMany('App\Models\post');
    }
}
