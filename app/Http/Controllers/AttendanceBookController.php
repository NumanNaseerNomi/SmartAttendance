<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\AttendanceModel;

class AttendanceBookController extends Controller
{
    function attendanceBookView()
    {
        $attendance = array();

        if(Session::get('user')->isAdmin)
        {
            $result = AttendanceModel::orderBy('checkIn', 'DESC')->get();

            for($i = 0; $i < sizeof($result); $i++)
            {
                $attendance[$i] =
                [
                    'attendance' => $result[$i],
                    'user' => AttendanceModel::find($result[$i]->id)->getUser,
                    'device' => AttendanceModel::find($result[$i]->id)->getDevice
                ];
            }
        }
        else
        {
            // dd(Session::get('user')->id);
            $result = AttendanceModel::where('userId', "6")->get();
            // return "User";
            // dd($result);


            // $result = AttendanceModel::find($request->id);
        
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

        // $result = AttendanceModel::orderBy('checkIn', 'DESC')->get();
        
        // $attendance = array();

        // for($i = 0; $i < sizeof($result); $i++)
        // {
        //     $attendance[$i] =
        //     [
        //         'attendance' => $result[$i],
        //         'user' => AttendanceModel::find($result[$i]->id)->getUser,
        //         'device' => AttendanceModel::find($result[$i]->id)->getDevice
        //     ];
        // }

        dd($attendance);
        // dd(Session::get('user'));

        return view('attendanceBookView', ['attendance' => $attendance]);
    }
}
