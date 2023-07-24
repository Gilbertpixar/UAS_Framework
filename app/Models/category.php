<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Fillable fields for the category.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'content',
    ];
}
