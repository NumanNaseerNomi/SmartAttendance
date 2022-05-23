<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    use HasFactory;

    protected $table = 'Attendance';
    protected $fillable = ['userId', 'deviceId', 'checkIn', 'checkOut', 'isPresent'];
    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo(UsersModel::class, 'userId');
    }

    public function getDevice()
    {
        return $this->belongsTo(DevicesModel::class, 'deviceId');
    }
}
