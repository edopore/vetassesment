@extends('app')
@section('content')
    <div class="container w-25 border p-4 my-4">
        <form action="{{route('citas.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="identification">Identificación</label>
                <input type="text" class="form-control" name="identification" id="identification" > 
            </div>
            <div class="form-group">
                <label for="ownerName">Nombre Completo del dueño</label>
                <input type="text" class="form-control" name="ownerFullName" id="ownerFullName" > 
            </div>
            <div class="form-group">
                <label for="petName">Nombre de la Mascota</label>
                <input type="text" class="form-control" name="petName" id="petName" > 
            </div>
            <div class="form-group">
            <div>
                <label for="date">Fecha de la Cita</label>
                <input type="date" class="form-control" name="date" id="date">
                <label for="time">Hora de la cita</label>
                <input type="time" min="14:00" max="18:00" step="3600" value="14:00" class="form-control" name="time" id="time"> 
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Cita</button>
        </form>
    </div>
@endsection
