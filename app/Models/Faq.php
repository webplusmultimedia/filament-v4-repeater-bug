<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /** @use HasFactory<\Database\Factories\FaqFactory> */
    use HasFactory;
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
