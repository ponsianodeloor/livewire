<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(){
        User::create([
            'name' => 'Ponsiano De Loor',
            'email' => 'ponsianodeloor@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password'=>Hash::make('ponsiano')
        ]);
        User::factory(10)->create();
    }
}
