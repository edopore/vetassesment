<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assesment;

class CalendarController extends Controller
{
    //
    public function index(Request $request){
        return view('calendario.index');
    }

    public function show(Assesment $cita){
        $cita = Assesment::all();
        return response()->json($cita);
    }
}
