@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3">
                @component('social.components.tweet', ['tweet' => $tweet])
                    
                @endcomponent
                <div class="mb-3"></div>
                @component('social.components.create', [
                    'placeholder' => 'Deja un comentario aquí', 
                    'btn' => 'Comentar',
                    'action' => route('comment.store', ['id' => $tweet->id])
                ])
                @endcomponent
                @component('social.components.comments', ['comments' => $tweet->comments])  
                @endcomponent
            </div>
        </div>
    </div>
@endsection