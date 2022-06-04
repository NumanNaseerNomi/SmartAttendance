<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\Collection;

use App\Models\AttendanceModel;

class AttendanceBookController extends Controller
{
    function attendanceBookView()
    {
        $result = array();
        $attendanceDetail = array();
        $attendanceDetail[] = new \stdClass();

        if(Session::get('user')->isAdmin)
        {
            $result = AttendanceModel::orderBy('checkIn', 'DESC')->get();
        }
        else
        {
            $result = AttendanceModel::where('userId', Session::get('user')->id)->get();
        }

        if(sizeof($result))
        {
            for($i = 0; $i < sizeof($result); $i++)
            {
                $attendanceDetail[$i] =
                [
                    'attendance' => $result[$i],
                    'user' => AttendanceModel::find($result[$i]->id)->getUser,
                    'device' => AttendanceModel::find($result[$i]->id)->getDevice
                ];
            }
        }
        
        $attendanceDetail = json_encode($attendanceDetail);
        
        return view('attendanceBookView')->with(['attendanceDetail' => $attendanceDetail]);
    }
}
