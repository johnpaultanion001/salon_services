<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'address',
        'status',
        'isRegister'
    ];

    public function requestedDocuments()
    {
        return $this->hasMany(RequestedDocument::class, 'resident_id' , 'id')->latest();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
