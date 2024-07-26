<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $incrementing = true;

    public function staff()
    {
        return $this->hasMany(Staff::class, 'role_id', 'role_id');
    }
}
