<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedDocumentRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'requested_document_id',
        'document_id',
        'name',
    ];
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
