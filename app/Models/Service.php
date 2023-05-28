<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'description',
        'isAvailable',
    ];
    public function staffs()
    {
        return $this->hasMany(User::class, 'service_id' , 'id');
    }
    public function appointments()
    {
        return $this->hasMany(ServiceAppointment::class, 'service_id' , 'id');
    }

}
