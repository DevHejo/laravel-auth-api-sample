<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = [
        'laravel_through_key',
        'created_at',
        'updated_at',
    ];

    // defining relations
    public function book() {
        return $this->hasManyThrough(
            '\App\Models\Book',
            '\App\Models\BookAuthor',
            // the below fields are optional
            'author_id', // current model id in the pivot table. That is the id in authors table related to author_id in book_author table.
            'id', // related and current model id. That is the id in the authors table.
            'id', // related model id. That is the id in the books table
            'book_id', // related model id in the pivot table. That is the id in the books table related to book_id in the book_author table.
        );
    }
}
