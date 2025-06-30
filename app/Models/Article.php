<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix'];

    // You can add any additional methods or relationships here if needed
    // For example, if you want to define relationships with other models
}
