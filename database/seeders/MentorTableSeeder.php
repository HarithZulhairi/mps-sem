<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MentorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mentors = [
            [
                'user_id' => 1,
                'M_name' => 'Muhd Hakim bin Azrizal',
                'M_IC' => '950723062349',
                'M_gender' => 'Male',
                'M_address' => 'Lot 67, Taman Impian, Melaka',
                'M_phoneNum' => '0199875612',
                'M_email' => 'hakim09@gmail.com',
            ],
            [
                'user_id' => 2,
                'M_name' => 'Nur Aisyah binti Adam',
                'M_IC' => '920902011076',
                'M_gender' => 'Female',
                'M_address' => 'No 987, Taman Jaya, Selangor',
                'M_phoneNum' => '0179216178',
                'M_email' => 'aisyah21@gmail.com',
            ],
        ];

        foreach ($mentors as $mentor) {
            DB::table('mentor')->updateOrInsert(
                ['user_id' => $mentor['user_id']],
                $mentor + ['created_at' => now(), 'updated_at' => now()]
            );

            $password = substr($mentor['M_IC'], -6);

            User::updateOrCreate(
                ['id' => $mentor['user_id']],
                [
                    'name' => $mentor['M_name'],
                    'email' => $mentor['M_email'],
                    'role' => 'mentor',
                    'password' => bcrypt($password),
                ]
            );
        }
    }
}