<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assesment;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
            if($request->fecha==Null){
                $citas = Assesment::all();
                $countCitas = 1;

            }else{
                $citas = Assesment::where('date','=',$request->fecha)->get();
                $countCitas = Assesment::where('date','=',$request->fecha)->count();
            }
            return view('citas.index',['citas'=>$citas,'count'=>$countCitas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'ownerFullName'=>'required',
            'petName'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);
        $validate = Assesment::where([['date','=',$request->date],['time','=',$request->time]])->count();
        if($validate == 1){
            return redirect()->route('citas.index')->with('error','Error: Cita ya fue asignada, por favor seleccione otro horario');
        }

        $cita = new Assesment;
        $cita->identification = $request -> identification;
        $cita->ownerFullName = $request -> ownerFullName;
        $cita->petName = $request -> petName;
        $cita->date = $request -> date;
        $cita->time = $request -> time;
        $cita->save();
        return redirect()->route('citas.index')->with('success','Exito: Su cita fue asignada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cita = Assesment::find($id);
        return view('citas.edit',['cita'=>$cita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = Assesment::where([['date','=',$request->date],['time','=',$request->time]])->count();
        if($validate == 1){
            return redirect()->route('citas.index')->with('error','Error: Cita ya fue asignada, por favor seleccione otro horario');
        }else{
            $cita = Assesment::find($id);
            $cita->date = $request -> date;
            $cita->time = $request -> time;
            $cita->save();
            return redirect()->route('citas.index')->with('success','Cita Asignada Correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cita = Assesment::find($id);
        $cita->delete();
        return redirect()->route('citas.index')->with('Success','Cita Cancelada');
    }
}
