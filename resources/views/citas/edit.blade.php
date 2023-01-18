@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4">
        <form action="{{route('citas.update',['cita'=>$cita->id])}}" method="post">
            @method('PATCH')
            @csrf
            @if(session('success'))
            <h5 class="alert alert-success">{{session('success')}}</h5>
            @endif
            @error('error')
            <h5 class="alert alert-danger">{{$message}}</h5>
            @enderror
            <div class="form-group">
                <label for="identification">Identificación</label>
                <input type="text" class="form-control" name="identification" id="identification" value="{{$cita->identification}}" disabled> 
            </div>
            <div class="form-group">
                <label for="ownerName">Nombre Completo del dueño</label>
                <input type="text" class="form-control" name="ownerFullName" id="ownerFullName" value="{{$cita->ownerFullName}}" disabled> 
            </div>
            <div class="form-group">
                <label for="petName">Nombre de la Mascota</label>
                <input type="text" class="form-control" name="petName" id="petName" value="{{$cita->petName}}" disabled> 
            </div>
            <div class="form-group">
            <div>
                <label for="date">Fecha de la Cita</label>
                <input type="date" class="form-control" name="date" id="date" value="{{$cita->date}}">
                <label for="time">Hora de la cita</label>
                <input type="time" class="form-control" name="time" id="time" value="{{$cita->time}}"> 
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Reasignar Cita</button>
            <a class="btn btn-danger" href="{{route('citas.index')}}">Volver</a>
        </form>
    </div>
@endsection
