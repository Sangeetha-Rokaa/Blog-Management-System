<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'slug',
        'attachment',
        'status',
        'is_published',
        'views'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
