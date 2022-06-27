<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevicesModel extends Model
{
    use HasFactory;

    protected $table = 'Devices';
    protected $fillable = ['name', 'deviceId', 'description', 'isBlocked'];
    public $timestamps = false;
}
