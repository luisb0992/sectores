<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\User::create([
          'cedula' => '00000000',
          'nombres'   => 'Admin',
          'apellidos' => 'Admin',
          'usuario'     => 'admin',
          'sector_id'     => 1,
          'password'  => bcrypt('admin123456')
        ]);
    }
}
