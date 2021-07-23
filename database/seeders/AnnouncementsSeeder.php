<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcements;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'id'             => 1,
                'image'           => 'a1.jpg',
                'title'           => 'Ano ang COVID-19?',
                'body' => 'Ang COVID-19 ay isangbagonguri ng coronavirus naumaapektosaiyongbaga at mgadaanan ng hininga. Ang mga coronavirus ay malaki at iba ibangpamilya ng mga virus nanagigingsanhi ng mgakaramdamanggaya ng karaniwangsipon.',
                'user_id' => '1',
                'link_website' => 'https://covid19.govt.nz/iwi-and-communities/translations/tagalog/the-covid-19-virus-and-symptoms/?fbclid=IwAR2sjUg9kWNDUXEjfTCZFrjK2NQLb5Ml76cscsDfwuR3VTY5_Fy_9f2VArc',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
         
        ];

        Announcements::insert($announcements);
    }
}
