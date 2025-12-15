<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staffMembers = [
            [
                'user_id' => 3,
                'S_name' => 'Kamarul bin Ariffin',
                'S_IC' => '871129082367',
                'S_gender' => 'Male',
                'S_address' => 'No 9834, Taman Permai, Selangor',
                'S_phoneNum' => '0119871087',
                'S_email' => 'kamarul87@gmail.com',
            ],
            [
                'user_id' => 4,
                'S_name' => 'Muhd Haziq bin Muhd Imran',
                'S_IC' => '970313065237',
                'S_gender' => 'Male',
                'S_address' => 'Lot 981, Taman Desa, Perak',
                'S_phoneNum' => '0129311908',
                'S_email' => 'haziq97@gmail.com',
            ],
            [
                'user_id' => 5,
                'S_name' => 'Alia Shuhada binti Abdullah',
                'S_IC' => '931201045692',
                'S_gender' => 'Female',
                'S_address' => 'Lot 12, DesaPark City, Seremban',
                'S_phoneNum' => '0129267892',
                'S_email' => 'alyasyu11@gmail.com',
            ],
            [
                'user_id' => 6,
                'S_name' => 'Nor Balqis binti Haikal',
                'S_IC' => '010206061076',
                'S_gender' => 'Female',
                'S_address' => 'No 34, Taman Hilir, Pahang',
                'S_phoneNum' => '0197851239',
                'S_email' => 'balqishaikal98@gmail.com',
            ],
        ];

        foreach ($staffMembers as $staff) {
            DB::table('staff')->updateOrInsert(
                ['user_id' => $staff['user_id']],
                $staff + ['created_at' => now(), 'updated_at' => now()]
            );

            $password = substr($staff['S_IC'], -6);

            User::updateOrCreate(
                ['id' => $staff['user_id']],
                [
                    'name' => $staff['S_name'],
                    'email' => $staff['S_email'],
                    'role' => 'staff',
                    'password' => bcrypt($password),
                ]
            );
        }
    }
}