<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;

class UseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin=Rol::where('Rol','Administrador')->first();

        $use=new User();
        $use->name='Adrian';
        $use->email='adrian.cruz.islas@gmail.com';
        $use->password=bcrypt('a8795%()');
        $use->save();
        $use->roles()->attach($admin);
    }
}
