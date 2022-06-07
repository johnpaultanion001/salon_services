<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'remarks',
        'isAvailable',
    ];
    public function requirements()
    {
        return $this->hasMany(DocumentRequirement::class, 'document_id' , 'id')->orderBy('name', 'asc');
    }
    public function requested_requirements()
    {
        return $this->hasMany(RequestedDocument::class, 'document_id' , 'id');
    }
}
