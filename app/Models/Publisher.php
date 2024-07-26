<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'publisher';
    protected $primaryKey = 'publisher_id';
    public $incrementing = true;

    //Function for one to many relationship to the book table
    public function book()
    {
        return $this->hasMany(Book::class, 'publisher_id', 'publisher_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }
}
