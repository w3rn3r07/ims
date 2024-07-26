<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    public $incrementing = true;

    //Function for Foreign Keys from tables

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'book_order', 'book_id', 'order_no')
            ->withPivot('quantity');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'publisher_id');
    }

    public function storeStock()
    {
        return $this->belongsToMany(StoreStock::class, 'storestock_book', 'book_id', 'storestock_id');
    }
}
