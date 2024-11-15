<?php

namespace App\Models;
use App\Models\Category;
use App\models\Author;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'categories_id',
        'author_id',
    ];

public function category()
{
    return $this->belongsTo(Category::class, 'categories_id');
}

    public function author()
    {
        return $this->belongsto(Author::class);
    }
}
