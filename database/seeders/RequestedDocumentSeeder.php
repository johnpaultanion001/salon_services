<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequestedDocument;

class RequestedDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requested_documents = [
            [
                'resident_id'             => 1,
                'document_id'             => 1,
                'date_you_need'           => date("Y-m-d"),
                'amount_paid'             => 100,

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'resident_id'             => 1,
                'document_id'             => 2,
                'date_you_need'           => date("Y-m-d"),
                'amount_paid'             => 100,

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];

        RequestedDocument::insert($requested_documents);
    }
}
