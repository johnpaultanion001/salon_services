<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Staff',
            ],
            [
                'id'    => 3,
                'title' => 'Resident',
            ],
        ];

        Role::insert($roles);
    }
}
