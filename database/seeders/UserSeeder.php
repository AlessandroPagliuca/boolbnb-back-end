<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'date_of_birth' => '1990-05-15',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password1'),
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'date_of_birth' => '1985-08-20',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password2'),
            ],
            [
                'name' => 'Michael',
                'surname' => 'Johnson',
                'date_of_birth' => '1992-03-10',
                'email' => 'michael.johnson@example.com',
                'password' => bcrypt('password3'),
            ],
            [
                'name' => 'Emily',
                'surname' => 'Davis',
                'date_of_birth' => '1994-11-25',
                'email' => 'emily.davis@example.com',
                'password' => bcrypt('password4'),
            ],
            [
                'name' => 'William',
                'surname' => 'Anderson',
                'date_of_birth' => '1991-07-05',
                'email' => 'william.anderson@example.com',
                'password' => bcrypt('password5'),
            ],
            [
                'name' => 'Olivia',
                'surname' => 'Brown',
                'date_of_birth' => '1988-09-12',
                'email' => 'olivia.brown@example.com',
                'password' => bcrypt('password6'),
            ],
            [
                'name' => 'James',
                'surname' => 'Taylor',
                'date_of_birth' => '1993-02-28',
                'email' => 'james.taylor@example.com',
                'password' => bcrypt('password7'),
            ],
            [
                'name' => 'Sophia',
                'surname' => 'Clark',
                'date_of_birth' => '1996-06-08',
                'email' => 'sophia.clark@example.com',
                'password' => bcrypt('password8'),
            ],
            [
                'name' => 'Benjamin',
                'surname' => 'Roberts',
                'date_of_birth' => '1990-12-17',
                'email' => 'benjamin.roberts@example.com',
                'password' => bcrypt('password9'),
            ],
            [
                'name' => 'Mia',
                'surname' => 'Walker',
                'date_of_birth' => '1989-04-30',
                'email' => 'mia.walker@example.com',
                'password' => bcrypt('password10'),
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->date_of_birth = $user['date_of_birth'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->save();
        }

    }
}
