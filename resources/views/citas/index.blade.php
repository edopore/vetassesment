@extends('app')
@section('content')
<div class="container w-100 border p-12 my-12">
        @if(session('success'))
            <h5 class="alert alert-success">{{session('success')}}</h5>
        @endif
        @if(session('error'))
            <h5 class="alert alert-danger">{{session('error')}}</h5>
        @endif
        @error('date')
            <h5 class="alert alert-danger">{{$message}}</h5>
        @enderror
        <form action="{{route('citas.index')}}" method="GET">
            <div>
                <div>
                    <label for="date">Fecha</label>
                    <input type="date" name="fecha" id="date">  
                    <button class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        @if($count>0)
        <table class="table text-align-center">
            <tr>
                <td>Identificación</td>
                <td>Nombre del Propietario</td>
                <td>Nombre de la Mascota</td>
                <td>Fecha de la Cita</td>
                <td>Hora de la cita</td>
                <td>Acción</td>
            </tr>
            @foreach($citas as $cita)
            <tr>
                <td>{{$cita->identification}}</td   >
                <td>{{$cita->ownerFullName}}</td    >
                <td>{{$cita->petName}}</td  >
                <td>{{$cita->date}}</td >
                <td>{{$cita->time}}</td >
                <td>
                <form action="{{route('citas.destroy',['cita'=>$cita->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-primary" href="{{route('citas.edit',['cita'=>$cita->id])}}">Editar</a>
                    <button class="btn btn-danger">Eliminar</button>
                </form>
                </td>
            </tr>
            @endforeach
            @else
            <h1 class="alert alert-danger">No hay Información</h1>
            @endif
        </table>
    </div>
@endsection