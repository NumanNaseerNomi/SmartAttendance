<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AttendanceModel;
use App\Models\DevicesModel;
use App\Models\UsersModel;

class AttendanceController extends Controller
{
    public function markAttendance(Request $request)
    {
        $request->validate(
            [
                'deviceId' => 'required',
                'cardId' => 'required',
            ]
        );

        $devicesModel = DevicesModel::where('deviceId', $request->deviceId)->first();

        if($devicesModel == null)
        {
            return ['message' => "This Device is not Authorized. Register this Device first."];
        }
        else if($devicesModel->isBlocked)
        {
            return ['message' => "This Device is Blocked! You can't mark attendance with this Device."];
        }
        else
        {
            $userModel = UsersModel::where('cardId', $request->cardId)->first();
            
            if($userModel == null)
            {
                return ['message' => "You are not Authorized. Register first."];
            }
            else if($userModel->isBlocked)
            {
                return ['message' => "You are Blocked! You can't mark attendance."];
            }
            else
            {
                $attendanceModel = AttendanceModel::where('userId', $userModel->id)->orderBy('id', 'desc')->first();
            
                if(!$attendanceModel || !$attendanceModel->isPresent)
                {
                    $attendanceData = 
                    [
                        'userId' => $userModel->id,
                        'deviceId' => $devicesModel->id,
                        'checkIn' => date("c"),
                        'isPresent' => '1',
                    ];
                     
                    $status = AttendanceModel::create($attendanceData);
                    
                    return ['message' => "Checked In Successfully.", "status" => $status];
                }
                else
                {
                    $attendanceData = 
                    [
                        'checkOut' => date("c"),
                        'isPresent' => '0',
                    ];
                    
                    $status = $attendanceModel->update($attendanceData);

                    return ['message' => "Checked Out Successfully.", "status" => $status];
                }
            }
        }
    }
}
