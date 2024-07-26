<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'author';
    protected $primaryKey = 'author_id';
    public $incrementing = true;

    //Function for one to many relationship to the publisher table
    public function publishers()
    {
        return $this->hasMany(Publisher::class, 'author_id', 'author_id');
    }
}
