<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ Auth::user()->profile_photo_url }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->email }}</p>
        </div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('dashboard') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ route('profile.show') }}"> <i class="icon-user"></i>Profile </a></li>
        <li><a href="{{ route('api-tokens.index') }}"> <i class="icon-key"></i>API Tokens </a></li>

        <!-- Account Management -->
        @auth
            @if (auth()->user()->email == 'admin@admin.com')
                <li><a href="{{ route('user.index') }}"><i class="icon-users"></i>{{ __('Users') }}</a></li>
                <li><a href="{{ route('product-category.index') }}"><i class="icon-list"></i>{{ __('Categories') }}</a></li>
            @endif
            @if(auth()->user()->role == \App\Enums\Role::Vendor)
                <li><a href="{{ route('product.index') }}"><i class="icon-basket"></i>{{ __('Products') }}</a></li>
            @endif
        @endauth
        <li><a href="{{ route('order') }}"><i class="icon-notebook"></i>{{ __('Orders') }}</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-logout"></i>{{ __('Logout') }}</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
