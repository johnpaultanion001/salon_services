<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Feedback;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'user_id'                   => 3,
                'first_name'                => 'Test',
                'last_name'                => 'test',
                'middle_name'                => 'test',
                'contact_number'                => '09776668820',
                'address'                => 'Antipolo City',
                'isRegister'            => true,
                'status'               => 'APPROVED',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],

        ];

        $feedbacks = [
            [
                'appointment_id' => 0,
                'user_id'                   => 3,
                'feedback'                => " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'appointment_id' => 0,
                'user_id'                   => 3,
                'feedback'                => " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'appointment_id' => 0,
                'user_id'                   => 3,
                'feedback'                => " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'appointment_id' => 0,
                'user_id'                   => 3,
                'feedback'                => " Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];


        Customer::insert($customers);
        Feedback::insert($feedbacks);
    }
}
