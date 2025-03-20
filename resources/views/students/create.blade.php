@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Estudiante</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>apellido:</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Dirección:</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
