<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // For admin
            [
                'id'                => '1',
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668820',
                'address'           => 'Antipol City',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '2',
                'name'              => 'Admin2',
                'email'             => 'admin2@admin2.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668821',
                'address'           => 'Antipol City',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            // For Staff
            [
                'id'                => '3',
                'name'              => 'Johnpaul Staff',
                'email'             => 'staff@staff.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668822',
                'address'           => 'Antipol City',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '4',
                'name'              => 'Johnpaul Staff2',
                'email'             => 'staff2@staff2.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
             // For resident
            [
                'id'                    => '5',
                'name'                  => null,
                'email'                 => 'johnpaultanion001@gmail.com',
                'password'              => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'        => null,
                'contact_number'        => null,
                'address'               => null,
                'created_at'            => date("Y-m-d H:i:s"),
                'updated_at'            => date("Y-m-d H:i:s"),
                'email_verified_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        User::insert($users);
    }
}
