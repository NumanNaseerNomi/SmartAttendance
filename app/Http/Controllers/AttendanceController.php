<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AttendanceModel;
use App\Models\DevicesModel;
use App\Models\UsersModel;

class AttendanceController extends Controller
{
    public function getAttendances()
    {
        $result = AttendanceModel::orderBy('checkIn', 'DESC')->get();
        // $result = AttendanceModel::all();
        
        $attendances = array();

        for($i = 0; $i < sizeof($result); $i++)
        {
            $attendances[$i] =
            [
                'attendance' => $result[$i],
                'user' => AttendanceModel::find($result[$i]->id)->getUser,
                'device' => AttendanceModel::find($result[$i]->id)->getDevice
            ];
        }

        return $attendances;
    }

    public function getAttendance(Request $request)
    {
        $result = AttendanceModel::find($request->id);
        
        if($result)
        {
            $attendance =
            [
                'attendance' => $result,
                'user' => AttendanceModel::find($result->id)->getUser,
                'device' => AttendanceModel::find($result->id)->getDevice
            ];
            
            return $attendance;
        }

        return $result;
    }

    public function markAttendance(Request $request)
    {
        $request->validate(
            [
                'deviceToken' => 'required',
                'cardId' => 'required',
            ]
        );

        $devicesModel = DevicesModel::where('token', $request->deviceToken)->first();

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

    public function delete(Request $request)
    {
        return AttendanceModel::find($request->id)->delete();
    }
}
