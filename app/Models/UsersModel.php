<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'Users';
    protected $fillable = ['name', 'userName', 'about', 'cardId', 'pinCode', 'isAdmin'];
    public $timestamps = false;
}
