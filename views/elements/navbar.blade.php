<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="" href="{{ route('home') }}">

            <div class="">

                <img style="max-height: 64px; max-width: 64px; max-width: 100%; height: auto;" src="{{ site_logo() }}" alt="{{ site_name() }}" data-tilt data-tilt-scale="1.1">

            </div>

        </a>

        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @foreach($navbar as $element)
                        @if($loop->index < ($loop->count / 2))
                            @if(!$element->isDropdown())
                                <li class="nav-item @if($element->isCurrent()) active @endif">
                                    <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $element->name }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $element->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($element->elements as $childElement)
                                            <a class="dropdown-item @if($childElement->isCurrent()) text-primary @endif" href="{{ $childElement->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $childElement->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endforeach
                    @foreach($navbar as $element)
                        @if($loop->index >= ($loop->count / 2))
                            @if(!$element->isDropdown())
                                <li class="nav-item @if($element->isCurrent()) active @endif">
                                    <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $element->name }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $element->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($element->elements as $childElement)
                                            <a class="dropdown-item @if($childElement->isCurrent()) active @endif" href="{{ $childElement->getLink() }}" @if($element->new_tab) target="_blank" rel="noopener" @endif>{{ $childElement->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <a href="/shop" class="nav-link shop shop2" style="color: white;"><span class="shopg"></span>Boutique</a>
        <div class="">
        <div class="container">
            <div class="row">
                <div class="">
                    @auth
                        @include('elements.notifications')

                        <span class="dropdown">
                            <a id="userDropdown" class="btn btn-outline-light btn-rounded dropdown-toggle my-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ trans('messages.nav.profile') }}
                            </a>

                            @if(Auth::user()->hasAdminAccess())
                                <a class="dropdown-item admin" href="{{ route('admin.dashboard') }}">
                                    {{ trans('messages.nav.admin') }}
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ trans('auth.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        </span>
                    @else
                        <div class="my-1 ml-lg-5 btn-group">
                            @if(Route::has('register'))
                                <a class="btn btn-outline-light btn-rounded" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                            @endif
                            <a class="btn btn-outline-light btn-rounded" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </nav>

<style>

.shop {
    display: block;
  width: 175px;
  text-align: center;
  max-width: 100%;
  margin: 0 auto;
  margin-bottom: 0;
  overflow: hidden;
  position: relative;
  transform: translatez(0);
  text-decoration: none;
  box-sizing: border-box;
  font-size: 18px;
    font-weight: normal;
    box-shadow: 0 9px 18px rgba(0,0,0,0.2);
    color: #fff; 
    text-transform: initial; 
    text-align: center; 
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
    font-weight: 700;
}

.shop2 {
    text-align: center;
    border-radius: 50px;
  padding: 26px;
  transition: all 0.2s ease-out 0s;
    color: #fff; 
    text-transform: initial; 
    text-align: center; 
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
    font-weight: 700;
}
.shop2:hover {
    text-align: center;
    border-radius: 50px;
  padding: 26px;
  transition: all 0.2s ease-out 0s;
    text-transform: initial; 
    text-align: center; 
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
    font-weight: 700;
}
            </style>

    
</header>
