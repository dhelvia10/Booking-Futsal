<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'field_id',
        'customer_name',
        'customer_phone',
        'date',
        'start_time',
        'end_time',
        'total_price',
        'status'
    ];

    // Relasi ke table fields
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

}
