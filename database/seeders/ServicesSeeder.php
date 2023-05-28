<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name'           => 'Hair & make up',
                'amount'         => '100',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Hair cut',
                'amount'         => '50',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Hair coloring',
                'amount'         => '50',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Pedicure',
                'amount'         => '150',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Manicure',
                'amount'         => '100',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Foot Spa',
                'amount'         => '300',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Eyelashes Extension',
                'amount'         => '90',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Basic Eyebrow Tattoo',
                'amount'         => '150',
                'description'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        Service::insert($services);
    }
}
