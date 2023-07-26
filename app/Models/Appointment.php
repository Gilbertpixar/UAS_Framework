<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'category_id',
        'message',
        'appointment_date',
    ];

    
    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
