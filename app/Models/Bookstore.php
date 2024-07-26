<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookstore extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'bookstore';
    protected $primaryKey = 'bookstore_id';
    public $incrementing = true;

    public function storeStock()
    {
        return $this->hasMany(StoreStock::class, 'bookstore_id', 'bookstore_id');
    }

    public function staff()
    {
        return $this->hasMany(Staff::class, 'bookstore_id', 'bookstore_id');
    }
}
