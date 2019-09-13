@extends('layouts.app')
{{-- @section('title', 'Muro') --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3">
                @component('social.components.create', [
                    'placeholder' => 'Crear nueva publicación', 
                    'btn' => 'Publicar',
                    'action' => route('tweet.store')
                ])
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                @component('social.components.tweets', ['tweets' => $tweets])
                @endcomponent
            </div>
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3 d-flex justify-content-center">
                {{ $tweets->links() }}
            </div>
            @if ($tweets->count() == 0)
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3 d-flex justify-content-center">
                <div class="jumbotron">
                    <h1 class="display-4">¡Bienvenido!</h1>
                    <p class="lead">Para ver publicaciones debes segir a alguien</p>
                    <hr class="my-4">
                    <p>Da click en el botón Usuarios para ver a las personas que puedes seguir</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('user.index') }}" role="button">Usuarios</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection