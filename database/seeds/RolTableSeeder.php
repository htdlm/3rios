<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol=new Rol();
        $rol->Rol='Administrador';
        $rol->save();

        $rol=new Rol();
        $rol->Rol='Capturador';
        $rol->save();

        $rol=new Rol();
        $rol->Rol='Invitado';
        $rol->save();
    }
}
