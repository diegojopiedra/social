@foreach (explode(' ', $text) as $word)
    @if (substr($word, 0, 1 ) === '#')
        <a href="{{ route('hashtag', ['hashtag' => substr($word, 1)]) }}">{{ $word }}</a>
    @elseif(substr($word, 0, 1 ) === '@')
        <a href="{{ route('user.show', ['user' => substr($word, 1)]) }}">{{ $word }}</a>
    @else
        {{ $word }}
    @endif
@endforeach