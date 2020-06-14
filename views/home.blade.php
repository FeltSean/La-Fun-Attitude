@extends('layouts.app')



@section('title', trans('messages.home'))



@section('content')

<link rel="stylesheet" href="{{ theme_asset('css/arya.css') }}">

    <!--Bannière / Title -->

    <div class="home-background mb-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center / cover">

        @if(theme_config('home_title'))

            <div class="container h-100">

                <div class="row align-items-center justify-content-center h-100">

                    <div class="col-md-6 text-center">

                        <h1 class="welcome-title">{{ theme_config('home_title') }}</h1>

        @endif

        <br>
        <div class="font-link subtitle align-items-center justify-content-center h-100">
            @if($server && ($playersCount = $server->getOnlinePlayers()) >= 0)
            <h1 style="text-align: center;" class="subtitle">{{ $server->address }}</h4>
            <h3 class="subtitle"><i class="fas fa-play"></i> {{ $playersCount }}</h3>
            @else

            <h4 class="font-link">{{ trans('theme::lfa.header.offline') }}</h4>                      
            @endif
        </div>
                  </div>

                </div>

            </div>  

    </div>

    <!-- Actualités -->

    <div class="container">

        <center><h1><a style="color:#fff;" href="/news">{{ theme_config('title') }}</a></h1></center>

        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post-preview mb-3">
                        @if($post->image !== null)
                            <img src="{{ $post->imageUrl() }}" class="post-img img-fluid" alt="{{ $post->title }}">
                        @endif

                        <div class="post-body">
                            <h3><a href="{{ route('posts.show', $post->slug) }}" style="color: #ffffff;">{{ $post->title }}</a></h3>
                            @if($post->image === null)
                                <p>{{ Str::limit(strip_tags($post->content), 250, '...') }}
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ trans('messages.posts.read') }}</a>
                                </p>
                            @endif

                            {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">

                <!-- Widget Discord -->

                @if(config('theme.discord-id'))
                    <iframe src="https://discordapp.com/widget?id={{ config('theme.discord-id') }}&theme=dark" title="Discord" height="500" class="discord-widget shadow mb-3" allowtransparency="true"></iframe>
                @endif

                <!-- Widget Twitter -->

                @if(config('theme.twitter'))
                    <div class="twitter-widget shadow">
                        <a class="twitter-timeline" data-theme="dark" data-height="500" href="{{ config('theme.twitter') }}">Tweets de {{ site_name() }}</a>
                    </div>
                @endif

                
            </div>
        </div>
    </div>

<!-- Bouton haut -->

<div><a id="bouton" class="cInvisible" href="#"></a></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("bouton").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
  };
});
</script>

@endsection

@push('scripts')
    <script src="https://platform.twitter.com/widgets.js" async></script>
@endpush