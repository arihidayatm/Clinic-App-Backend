<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;

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

        return view('pages.doctor_schedules.index', compact('doctorSchedules'));
        }

    //create
    public function create()
    {
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.create', compact('doctors'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $doctorSchedule = new DoctorSchedule();
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->start_time = $request->start_time;
        $doctorSchedule->end_time = $request->end_time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctor-schedules.index');
    }

    //edit
    public function edit($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctors = Doctor::all();
        return view('pages.doctor_schedules.edit', compact('doctorSchedule', 'doctors'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->doctor_id = $request->doctor_id;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->start_time = $request->start_time;
        $doctorSchedule->end_time = $request->end_time;
        $doctorSchedule->status = $request->status;
        $doctorSchedule->note = $request->note;
        $doctorSchedule->save();

        return redirect()->route('doctor-schedules.index');
    }

    //destroy
    public function destroy($id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctorSchedule->delete();
        return redirect()->route('doctor_schedules.index');
    }
}
