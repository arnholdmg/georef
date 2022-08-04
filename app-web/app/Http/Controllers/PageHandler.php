<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Group;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageHandler extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function findCoord()
    {
        return view('find-coord');
    }

    public function area()
    {
        return view('area');
    }

    public function areaCreate()
    {
        return view('area-create');
    }

    public function areaUpdate(int $area_id)
    {
        $area = Area::findOrFail($area_id);

        return view('area-update', ['area' => $area]);
    }
    
    public function group()
    {
        return view('group');
    }

    public function groupCreate()
    {
        return view('group-create');
    }

    public function groupUpdate(int $group_id)
    {
        $group = Group::findOrFail($group_id);

        return view('group-update', ['group' => $group]);
    }

    public function patient()
    {
        return view('patient');
    }

    public function patientCreate()
    {
        return view('patient-create');
    }

    public function patientUpdate(int $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);

        return view('patient-update', ['patient' => $patient]);
    }

    public function user()
    {
        return view('user');
    }

    public function userCreate()
    {
        return view('user-create');
    }

    public function userUpdate(int $user_id)
    {
        $user = User::findOrFail($user_id);
        
        if($user->id == 1 || $user->id == Auth::user()->id){
            return redirect()->route('user');
        } else {
            return view('user-update', ['user' => $user]);
        }
    }
}
