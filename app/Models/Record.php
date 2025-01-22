<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'description',
        'price',
        'stock',
        'condition',
        'release_year',
        'category_id',
        'cover_image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'release_year' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
