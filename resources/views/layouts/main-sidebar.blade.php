<!-- main-sidebar -->
<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll  ">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        @if (auth('web')->check())
            @include('layouts.main-sidebar.admin-sidebar')
        @elseif(auth('student')->check())
            @include('layouts.main-sidebar.student-sidebar')
        @elseif(auth('teacher')->check())
            @include('layouts.main-sidebar.teacher-sidebar')
        @elseif(auth('parent')->check())
            @include('layouts.main-sidebar.parent-sidebar')
        @endif
    </div>
</aside>
<!-- main-sidebar -->
