<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    protected $table='rol_use';

    protected $fillable=['RolId','UseId','created_at','updated_at'];

    protected $primaryKey='id';

    public function usuario()
    {
      return $this->belongsTo(User::class,'UseId');
    }

    public function rol()
    {
      return $this->belongsTo(Rol::class,'RolId');
    }
}
