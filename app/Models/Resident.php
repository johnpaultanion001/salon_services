<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'id_image',
        'contact_number',
        'address',
        'qr_code',
        'isApprove'
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
