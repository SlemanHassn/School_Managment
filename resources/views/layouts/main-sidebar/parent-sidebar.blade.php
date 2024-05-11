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
                        src="{{ URL::asset('assets/img/parent.png') }}"><span
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
                <a class="side-menu__item" href="{{ url('/parent/dashboard') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/66.png') }}" class="side-menu__icon"
                        alt="">
                    <span class="side-menu__label">{{ trans('side.Dashborad') }}</span></a>
            </li>
            {{-- الابناء --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('Sons') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/childreen.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label"> {{ trans('Dparent.children') }}
                    </span></a>
            </li>
            {{-- تقرير الحضور والغياب --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('attendance') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/attendance.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">
                        {{ trans('Dparent.Attendance_and_absence_report') }}
                    </span></a>
            </li>
            {{-- تقرير المالية --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('Fees_invoiceParent') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/financial.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label"> {{ trans('Dparent.Financial_report') }}
                    </span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('profileparent.index') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/profile.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('Dstudent.Myprofile') }}</span></a>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
