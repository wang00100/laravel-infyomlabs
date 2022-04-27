<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <!-- <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="65"
             alt="Infyom Logo"> -->
        <h2 style="margin-top:20px;">{{ config('app.name') }}</h2>
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
          <h2>{{ config('app.name') }}</h2>
            <!-- <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/> -->
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
