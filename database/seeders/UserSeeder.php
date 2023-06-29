<?php

namespace Database\Seeders;

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
                'email_verified_at' => now(),
                'password' => bcrypt('password1'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'date_of_birth' => '1985-08-20',
                'email' => 'jane.smith@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password2'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael',
                'surname' => 'Johnson',
                'date_of_birth' => '1992-03-10',
                'email' => 'michael.johnson@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily',
                'surname' => 'Davis',
                'date_of_birth' => '1994-11-25',
                'email' => 'emily.davis@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'William',
                'surname' => 'Anderson',
                'date_of_birth' => '1991-07-05',
                'email' => 'william.anderson@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password5'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olivia',
                'surname' => 'Brown',
                'date_of_birth' => '1988-09-12',
                'email' => 'olivia.brown@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password6'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'James',
                'surname' => 'Taylor',
                'date_of_birth' => '1993-02-28',
                'email' => 'james.taylor@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password7'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sophia',
                'surname' => 'Clark',
                'date_of_birth' => '1996-06-08',
                'email' => 'sophia.clark@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password8'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Benjamin',
                'surname' => 'Roberts',
                'date_of_birth' => '1990-12-17',
                'email' => 'benjamin.roberts@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password9'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mia',
                'surname' => 'Walker',
                'date_of_birth' => '1989-04-30',
                'email' => 'mia.walker@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password10'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);

    }
}