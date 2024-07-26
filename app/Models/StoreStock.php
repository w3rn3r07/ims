<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStock extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'store_stock';
    protected $primaryKey = 'storestock_id';
    public $incrementing = true;

    public function bookstore()
    {
        return $this->belongsTo(Bookstore::class, 'bookstore_id', 'bookstore_id');
    }

    public function book()
    {
        return $this->belongsToMany(Book::class, 'storestock_book', 'storestock_id', 'book_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'storestock_id', 'storestock_id');
    }
}
