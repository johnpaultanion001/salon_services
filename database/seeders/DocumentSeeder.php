<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\DocumentRequirement;

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
                'id'             => 1,
                'name'           => 'Barangay Indigency',
                'amount'         => '100',
                'remarks'        => null,
            
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => 2,
                'name'           => 'Cedula',
                'amount'         => '100',
                'remarks'        => null,
            
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];
        $requirements = [
            [
                'document_id'             => 1,
                'name'                    => 'Birth Certificate',
                
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'document_id'             => 1,
                'name'                    => 'Voter Stab/Voter Certificate',
                
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'document_id'             => 2,
                'name'                    => 'Birth Certificate',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        DocumentRequirement::insert($requirements);
        Document::insert($documents);
    }
}
