<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            'username' => 'admin1',
            'password' => bcrypt('scipio311')
        ];

        $userData = [
            'username' => 'admin2',
            'password' => bcrypt('ahmaddahlan978')
        ];
            
        User::create($userData);
       
    }
}