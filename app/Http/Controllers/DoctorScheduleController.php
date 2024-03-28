<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')
        ->when($request->input('doctor_id'), function ($query, $doctor_id) {
            return $query->where('doctor_id', $doctor_id);
        })
        ->orderBy('id', 'desc')
        ->load('doctor')
        ->paginate(10);

        return view('pages.doctor_schedule.index', compact('doctorSchedules'));
        }
}
