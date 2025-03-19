@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de Manager</div>

                    <div class="card-body">
                        <h1>Bienvenido Manager: {{ $user->name }}</h1>
                        <p>Email: {{ $user->email }}</p>
                        <p>Rol: {{ $user->role }}</p>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
