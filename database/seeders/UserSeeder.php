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
                'service_id'            => null,
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
                'service_id'            => null,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
             // For customer
            [
                'id'                    => '3',
                'name'                  => null,
                'email'                 => 'customer@gmail.com',
                'password'              => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'        => null,
                'contact_number'        => null,
                'address'               => null,
                'service_id'            => null,
                'created_at'            => date("Y-m-d H:i:s"),
                'updated_at'            => date("Y-m-d H:i:s"),
                'email_verified_at'     => date("Y-m-d H:i:s"),
            ],
              // For Staff
              [
                'id'                => '4',
                'name'              => 'Hair & make up Staff',
                'email'             => 'staff@staff.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668822',
                'address'           => 'Antipol City',
                'service_id'        => 1,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '5',
                'name'              => 'Hair cut Staff',
                'email'             => 'staff2@staff2.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '6',
                'name'              => 'Hair coloring Staff',
                'email'             => 'staff3@staff3.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 3,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '7',
                'name'              => 'Pedicure Staff',
                'email'             => 'staff4@staff4.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 4,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '8',
                'name'              => 'Manicure Staff',
                'email'             => 'staff5@staff5.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 5,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '9',
                'name'              => 'Foot Spa Staff',
                'email'             => 'staff6@staff6.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 6,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '10',
                'name'              => 'Eyelashes Extension Staff',
                'email'             => 'staff7@staff7.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 7,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'                => '11',
                'name'              => 'Basic Eyebrow Tattoo Staff',
                'email'             => 'staff8@staff8.com',
                'password'          => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'remember_token'    => null,
                'contact_number'    => '09776668823',
                'address'           => 'Antipol City',
                'service_id'        => 8,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
            ],
        ];

        User::insert($users);
    }
}
