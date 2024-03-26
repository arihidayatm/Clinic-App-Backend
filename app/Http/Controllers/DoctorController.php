<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index',compact('doctors'));
    }

    //create
    public function create(){
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request){
        $request->validate([
            'doctor_name' => 'required',
            'doctor_birthday' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'doctor_address' => 'required',
            'doctor_sip' => 'required',
            'doctor_specialist' => 'required',
            'doctor_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if($request->hasFile('doctor_photo')){
            $image = $request->file('doctor_photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $filename);
            DB::table('doctors')->insert([
                'doctor_name' => $request->doctor_name,
                'doctor_birthdate' => $request->doctor_birthday,
                'doctor_email' => $request->doctor_email,
                'doctor_phone' => $request->doctor_phone,
                'doctor_address' => $request->doctor_address,
                'doctor_sip' => $request->doctor_sip,
                'doctor_specialist' => $request->doctor_specialist,
                'doctor_photo' => $filename,
            ]);
            Doctor::create([
                'doctor_name' => $request->doctor_name,
                'doctor_birthdate' => $request->doctor_birthday,
                'doctor_email' => $request->doctor_email,
                'doctor_phone' => $request->doctor_phone,
                'doctor_address' => $request->doctor_address,
                'doctor_sip' => $request->doctor_sip,
                'doctor_specialist' => $request->doctor_specialist,
                'doctor_photo' => $filename,
            ]);
            return redirect()->route('doctors.index')->with('success','Doctor Added Successfully');
        }
    }

    //show
    public function show($id){
        $doctors = DB::table('doctors')->where('id',$id)->first();
        return view('pages.doctors.show',compact('doctors'));
    }

    //edit
    public function edit($id){
        $doctors = DB::table('doctors')->where('id',$id)->first();
        return view('pages.doctors.edit',compact('doctors'));
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'doctor_name' => 'required',
            'doctor_birthday' => 'required',
            'doctor_email' => 'required|email',
            'doctor_phone' => 'required',
            'doctor_address' => 'required',
            'doctor_sip' => 'required',
            'doctor_specialist' => 'required',
            'doctor_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if($request->hasFile('doctor_photo')){
            $image = $request->file('doctor_photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/doctors'), $filename);
            DB::table('doctors')->where('id',$id)->update([
                'doctor_name' => $request->doctor_name,
                'doctor_birthdate' => $request->doctor_birthday,
                'doctor_email' => $request->doctor_email,
                'doctor_phone' => $request->doctor_phone,
                'doctor_address' => $request->doctor_address,
                'doctor_sip' => $request->doctor_sip,
                'doctor_specialist' => $request->doctor_specialist,
                'doctor_photo' => $filename,
            ]);
            Doctor::where('id',$id)->update([
                'doctor_name' => $request->doctor_name,
                'doctor_birthdate' => $request->doctor_birthday,
                'doctor_email' => $request->doctor_email,
                'doctor_phone' => $request->doctor_phone,
                'doctor_address' => $request->doctor_address,
                'doctor_sip' => $request->doctor_sip,
                'doctor_specialist' => $request->doctor_specialist,
                'doctor_photo' => $filename,
            ]);
            return redirect()->route('doctors.index')->with('success','Doctor Updated Successfully');
        }
    }

    //delete
    public function delete($id){
        DB::table('doctors')->where('id',$id)->delete();
        return redirect()->route('doctors.index')->with('success','Doctor Deleted Successfully');
    }
}
