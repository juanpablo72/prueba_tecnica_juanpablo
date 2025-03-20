@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name', $student->first_name) }}" required>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Apellido:</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name', $student->last_name) }}" required>
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label>Dirección:</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $student->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
