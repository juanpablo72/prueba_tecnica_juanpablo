@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Lista de Estudiantes</h1>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Nuevo Estudiante</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($students->hasPages())
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($students->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev">&laquo;</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $students->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($students->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
@endsection
