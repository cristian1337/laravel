<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Cristian',
            'email' => 'cris@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'rol' => 'cliente',
        ]);

        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'rol' => 'conductor',
        ]);
    }
}
