@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Detalles del Estudiante</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Información Personal</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Nombre:</strong> {{ $student->first_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Apellido:</strong> {{ $student->last_name }}
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Dirección</h5>
                        <p class="card-text">{{ $student->address }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
