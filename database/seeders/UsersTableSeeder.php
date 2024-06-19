<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Karim Majd', 'mbti_type' => 'INTJ', 'email' => '1@gmail.com'],
            ['name' => 'Mariam Kabbaj', 'mbti_type' => 'INFP', 'email' => '2@gmail.com'],
            ['name' => 'Youssef Nasser', 'mbti_type' => 'ENTP', 'email' => '3@gmail.com'],
            ['name' => 'Layla Mansour', 'mbti_type' => 'INFJ', 'email' => '4@gmail.com'],
            ['name' => 'Sara Benani', 'mbti_type' => 'ENFP', 'email' => '5@gmail.com'],
            ['name' => 'Mohammed Aloui', 'mbti_type' => 'ISTJ', 'email' => '6@gmail.com'],
            ['name' => 'Hoda Aloui', 'mbti_type' => 'ISFP', 'email' => '7@gmail.com'],
            ['name' => 'Nizar Abdelaziz', 'mbti_type' => 'ESFJ', 'email' => '8@gmail.com'],
            ['name' => 'Rim Alhassan', 'mbti_type' => 'ENTJ', 'email' => '9@gmail.com'],
        ];

        $password = 'ouissale';
        $hashedPassword = Hash::make($password);

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'mbti_type' => $user['mbti_type'],
                'password' => $hashedPassword,
                'email' => $user['email'],
                'email_verified_at' => Carbon::now(), // Utilisation de Carbon pour obtenir la date actuelle
                'created_at' => Carbon::now(), // Utilisation de Carbon pour obtenir la date actuelle
                'updated_at' => Carbon::now(), // Utilisation de Carbon pour obtenir la date actuelle
            ]);
        }
    }
}
