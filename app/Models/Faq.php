<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'title',
        'contents',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'contents' => 'array',
    ];
}
