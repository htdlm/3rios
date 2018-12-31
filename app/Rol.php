<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='rol';

    protected $fillable=['RolId','Rol'];

    protected $primaryKey='RolId';

    public function usuarios()
    {
    	return $this->belongsToMany(User::class,'rol_use','RolId','UseId')->withTimestamps();
    }
}
