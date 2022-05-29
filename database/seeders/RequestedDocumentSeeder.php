<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequestedDocument;
use App\Models\RequestedDocumentRequirement;

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
                'amount_to_pay'             => 100,
                'receipt'                  => 'receipt1.png',
                'claiming_option'           => 'downloadable',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'resident_id'             => 1,
                'document_id'             => 2,
                'date_you_need'           => date("Y-m-d"),
                'amount_to_pay'             => 100,
                'receipt'                  => 'receipt2.png',
                'claiming_option'           => 'downloadable',
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
        ];
        $requested_documents_requirements = [
            [
                'requested_document_id'             => 1,
                'document_id'                       => 1,
                'name'                              => '1653654703.docx',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'requested_document_id'             => 1,
                'document_id'                       => 1,
                'name'                              => '1653654703.pdf',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
            [
                'requested_document_id'             => 2,
                'document_id'                       => 2,
                'name'                              => '1653654702.pdf',

                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],
           
           
        ];

        RequestedDocument::insert($requested_documents);
        RequestedDocumentRequirement::insert($requested_documents_requirements);
    }
}
