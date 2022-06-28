<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;




class post extends Model
{
    public $timestamps = false;
    protected $table = 'post';
    protected $keyType='string';
    // protected $dateFormat='U';
    // protected $primaryKey = array('id_post', 'id');
    public $incrementing=false;
    
    // id       | nome    | cognome     | email| password | avatar| sesso | n_telefono | data_nascita | paese
    // protected $fillable = ['id',]
    public function utente()
    {
        return $this->belongsTo('App\Models\utente');
    }
}
