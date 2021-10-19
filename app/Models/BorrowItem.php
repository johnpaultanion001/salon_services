<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purpose',
        'date',
        'time',
        'end_of_funeral',
        'status',
        'comment',
        'isRemove',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
