<?php

namespace App\Models;
use App\models\Book;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function books()
    {
        return $this->hasmany(Book::class);
    }
}