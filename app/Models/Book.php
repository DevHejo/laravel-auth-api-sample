<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'publication_year'];

    protected $hidden = [
        'laravel_through_key',
        'created_at',
        'updated_at',
    ];

    // defining relations
    public function author() {
        return $this->hasManyThrough(
            '\App\Models\Author',
            '\App\Models\BookAuthor',
            // the below fields are optional
            'book_id', // current model id in the pivot table. That is the id in the books table which is related to the book_id in the book_author table.
            'id', // related and current model id. That is the id in the books table.
            'id', // related model id. That is the id in the authors table.
            'author_id', //related model id in the pivot table. That is the id in the authors table relating to author_id in the book_author table.
        );
    }
}
