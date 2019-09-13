<div class="card">
    <div class="card-body">
        <div class="container-fludi">
            <div class="row">
                <div class="col-5">
                    @component('social.components.img', [
                        'img' => $user->profile_pic,
                        'class' => 'w-100'
                    ])
                    @endcomponent
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="h2">
                                {{ $user->name }} {{ $user->lastname }}
                            </h1>
                            <p>
                                <a class="text-secondary" href="{{ route('user.show', ['username' => $user->username]) }}">
                                    @<span>{{ $user->username }}</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <b class="text-primary">Segidores {{ count($user->followers) -1}}</b>
                        </div>
                        <div class="col-6">
                            <b class="text-primary">Segidos {{ count($user->following) -1}}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @component('social.components.follow_buttom', ['user' => $user])
                            @endcomponent
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>