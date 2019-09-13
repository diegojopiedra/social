<div class="user">
    @component('social.components.img', [
        'img' => $user->profile_pic,
        'class' => 'user__img'
    ])
    @endcomponent
    <b>
        {{ $user->name }} {{ $user->lastname }}
    </b>
    <a href="{{ route('user.show', ['username' => $user->username]) }}" class="text-secondary">@<span>{{ $user->username }}</span></a>
    @if (isset($time_ago) && $time_ago)
        <span>
            | {{ (new Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Es()))->inWords(new DateTime($time_ago)) }}
        </span>
    @endif
</div>