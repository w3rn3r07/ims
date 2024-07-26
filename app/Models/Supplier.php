<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'supplier';
    protected $primaryKey = 'supplier_id';
    public $incrementing = true;

    public function orders()
    {
        return $this->hasMany(Orders::class, 'supplier_id', 'supplier_id');
    }
}
