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
        'document_requirement_id',
        'name',
    ];
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
    public function document_requirement()
    {
        return $this->belongsTo(DocumentRequirement::class, 'document_requirement_id');
    }
}
