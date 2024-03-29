<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use carbon\carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name'=>'juyel',
            'email'=>'juyel@gmail.com',
            'password'=> Hash::make('11111111'),
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
    }
}
