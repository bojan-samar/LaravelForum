<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Superadmin',
                'email' => 'superadmin@app.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'uuid' => Str::uuid(),
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'uuid' => Str::uuid(),
                'name' => 'Subscriber',
                'email' => 'subscriber@app.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
