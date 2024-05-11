<!-- main-sidebar -->
<div class="app-sidebar__overlay " data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll shadow-lg ">
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
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/student.png') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ trans('side.Main') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/student/dashboard') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/66.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.Dashborad') }}</span></a>
            </li>
             <li class="slide">
                <a class="side-menu__item" href="{{ route('Sexam') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/tests.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('Dstudent.Exams') }}</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('profileStudent.index') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/profile.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('Dstudent.Myprofile') }}</span></a>
            </li>


        </ul>
    </div>
</aside>
<!-- main-sidebar -->
