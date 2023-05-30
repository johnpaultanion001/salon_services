<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'service_id',
        'staff_id',
        'appointment_date',
        'appointment_time',
        'note',
        'receipt',
        'status',
        'isRemove',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'appointment_id' , 'id')->latest();
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }
    public function feedback()
    {
        return $this->belongsTo(Feedback::class,'id', 'appointment_id');
    }
}
