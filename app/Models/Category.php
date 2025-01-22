<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
