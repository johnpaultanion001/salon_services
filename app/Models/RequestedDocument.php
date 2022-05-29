<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'resident_id',
        'document_id',
        'date_you_need',
        'amount_to_pay',
        'receipt',
        'claiming_option',
        'downloadable',
        
        'note',
        'status',
        'isPaid',
        'isRemove',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
    public function requirements()
    {
        return $this->hasMany(RequestedDocumentRequirement::class, 'requested_document_id' , 'id')->orderBy('name', 'asc');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'requested_document_id' , 'id')->latest();
    }
}
