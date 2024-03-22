<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(){
        $doctors = DB::table('doctors')->paginate(10);
        return view('pages.doctor.index',compact('doctors'));
    }
}
