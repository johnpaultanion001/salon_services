<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documents = [
            [
                'name'           => 'Barangay Indigency',
                'amount'         => '100',
                'requirements'   => 'Birth Certificate',
                'remarks'        => null,
            
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'name'           => 'Cedula',
                'amount'         => '100',
                'requirements'   => 'Birth Certificate',
                'remarks'        => null,
            
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            
        ];

        Document::insert($documents);
    }
}
