@extends('layouts.app')
{{-- @section('title', 'Usuarios') --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
            @foreach ($users as $user)
                <div class="col-md-6 mb-4">
                    @component('social.components.user_card', [
                        'user' => $user
                    ])
                    @endcomponent
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    
@endsection