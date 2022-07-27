<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Group;
use App\Models\Patient;

class PageHandler extends Controller
{
    public function home()
    {
        return view('home');
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
}
