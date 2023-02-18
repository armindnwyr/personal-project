<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Admin',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(PostSeeder::class);
        // $this->call(AutorSeeder::class);
        $this->call(LibroSeeder::class);
        $this->call(ArmindSeeder::class);

    }
}
