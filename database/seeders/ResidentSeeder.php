<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resident;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residents = [
            [
                'user_id'                   => 5,
                'first_name'                => 'Johnpaul',
                'last_name'                => 'Tanion',
                'middle_name'                => 'Valdez',
                'id_image'                => 'tanion_1.png',
                'contact_number'                => '09776668820',
                'address'                => 'Antipolo City',
                'qr_code'                => '450eafdf-bd0a-4a64-bd1c-6c6c95c206de',
                'isRegister'            => true,
                'status'               => 'APPROVED',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            
        ];

        Resident::insert($residents);
    }
}
