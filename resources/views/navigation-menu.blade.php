<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{ route('home') }}" class="logo"><img src="images/dropme-logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shops') }}">Stores</a>
            </li>
        </ul>

        <li>

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </li>

    </div>
    <div id="main">
        <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="images/toggle-icon.png"
                                                                                          style="height: 30px;"></span>
    </div>
</nav>

