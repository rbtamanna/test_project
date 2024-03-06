<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'id'=> 1
        ],
            [
                'name' => 'Rabeya Bosri Tamanna',
                'email' => 'rabeya.bosri.tamanna@portonics.com',
                'password' => Hash::make('welcome'),
            ]);
    }
}
