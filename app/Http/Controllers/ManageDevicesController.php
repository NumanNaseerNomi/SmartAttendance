<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DevicesModel;

class ManageDevicesController extends Controller
{
    function show()
    {
        $result = DevicesModel::all();
        return view('manageView')->with(['result' => $result, 'type' => 'Device', 'idType' => 'Device']);
    }

    function save(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'name' => 'required',
                'deviceId' => 'required',
                'description' => 'required',
                'isBlocked' => 'required'
            ]
        );

        if($request->id)
        {
            $result = DevicesModel::find($request->id);
            $result->update($request->all());
        }
        else
        {
            DevicesModel::create($request->all());
        }
        
        return redirect()->back();
    }
}
