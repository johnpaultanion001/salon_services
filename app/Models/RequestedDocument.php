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
        'amount_paid',
        'note',
        'status',
        'isPaid',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
