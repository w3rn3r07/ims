<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    use HasFactory;

    //defining and setting primary key and auto incrementing for it
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $incrementing = true;

    protected $fillable = [
        'fname', 'lname', 'username', 'password', 'phone_no', 'emergency_no', 'email',
        'city', 'street_name', 'postcode', 'sick_days', 'accidents_report', 'bookstore_id', 'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bookstore()
    {
        return $this->belongsTo(Bookstore::class, 'bookstore_id', 'bookstore_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    public function orders()
    {
        return $this->hasMany(Orders::class, 'staff_id', 'staff_id');
    }
}
