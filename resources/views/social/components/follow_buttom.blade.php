@if (Auth::user()->id != $user->id)
    @if (Auth::user()->following->contains($user))
        <a class="btn btn-secondary" href="{{ route('follow', ['id' => $user->id]) }}">
            Dejar de seguir
        </a>
    @else
        <a class="btn btn-primary" href="{{ route('follow', ['id' => $user->id]) }}">
            Seguir
        </a>
    @endif
    
@endif