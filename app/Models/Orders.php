<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'orders';
    protected $primaryKey = 'order_no';
    public $incrementing = true;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_order', 'order_no', 'book_id')
            ->withPivot('quantity');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function storeStock()
    {
        return $this->belongsTo(StoreStock::class, 'storestock_id', 'storestock_id');
    }
}
