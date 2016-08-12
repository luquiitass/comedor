<?php

use Illuminate\Database\Seeder;

use App\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        DB::table('users')->delete();
        for ($i=0; $i < 200; $i++) { 
            User::create([
            	'password' => bcrypt('lucas'),
                'email' => $faker->email(),
                'legajo' => $faker->ean8(),
                'nombre' => $faker->name(),
                'apellido' => $faker->lastName(),
                'dni' => $faker->phoneNumber(),
                'telefono' => $faker->phoneNumber(),
                'tipo' => 'ambos',
                'estado_id' => '2',
                'imagen' => 'storage/login2-png'
            ]);
        }
    }
}
