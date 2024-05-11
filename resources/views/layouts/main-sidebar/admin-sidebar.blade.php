        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround "
                        src="{{ URL::asset('assets/img/admin.png') }}"><span
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
                <a class="side-menu__item" href="{{ url('/' . ($page = 'index')) }}"> <img
                        src="{{ URL::asset('assets/img/svgicons/66.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.Dashborad') }}</span></a>
            </li>
            {{-- Grades --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/Grade.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.school_grade') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('grade.index') }}">{{ trans('side.grades_list') }}</a>
                    </li>
                </ul>
            </li>

            {{-- classrooms --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/classroom.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.class_Room') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('classroom.index') }}">{{ trans('side.class_list') }}</a>
                    </li>
                </ul>
            </li>
            {{-- students --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/students.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.Students') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    <li><a class="slide-item"
                            href="{{ route('Students.create') }}">{{ trans('side.Add_Student') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('Students.index') }}">{{ trans('side.List_Students') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('Promotions.index') }}">{{ trans('Students_trans.Students_Promotions') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('Promotions.create') }}">{{ trans('Students_trans.Manag_Promotions') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('Graduates.index') }}">{{ trans('side.list_Graduate') }}</a>
                    </li>

                </ul>
            </li>

            {{-- Teachers  --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/teachers.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.Teachers') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('Teachers.index') }}">{{ trans('side.List_Teachers') }}</a>
                    </li>

                </ul>
            </li>

            {{-- Parents --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/parents.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.Parents') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('add_parent') }}">{{ trans('side.Parents_list') }}</a>
                    </li>

                </ul>
            </li>
            {{-- sections --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/sections.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('side.sections') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('section.index') }}">{{ trans('side.List_sections') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Accounts --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/accounts.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('Fees.Accounts') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Fees.index') }}">{{ trans('Fees.study_fees') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('FeeInvoices.index') }}">{{ trans('Fees_Invoices.Fee_invoices') }}</a>
                    </li>
                    <li><a class="slide-item" href="{{ route('Receipts.index') }}"> {{ trans('Fees.receipt') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('ProcessingFee.index') }}">{{ trans('Fees_Invoices.Fee_processing') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('Payment.index') }}">{{ trans('Fees_Invoices.Bills_of_exchange') }}</a>
                    </li>
                </ul>
            </li>

            {{-- Attendance --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/attendance.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('Students_trans.Attendance') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('Attendance.index') }}">{{ trans('side.List_Students') }}</a>
                    </li>
                </ul>
            </li>
            {{-- subjects --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/subjects.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label"> {{ trans('Subjects.Subject') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('subjects.index') }}"> {{ trans('Subjects.LOAS') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Quizze --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/tests.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('tests.Tests') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('quizze.index') }}">{{ trans('tests.List_tests') }}</a>
                    </li>
                    <li><a class="slide-item" href="{{ route('questions.index') }}">{{ trans('tests.List_q') }}</a>
                    </li>
                </ul>
            </li>
            {{-- library --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><img
                        src="{{ URL::asset('assets/img/svgicons/library.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label"> {{ trans('tests.library') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('library.index') }}">{{ trans('tests.List_L') }}</a>
                    </li>
                </ul>
            </li>
            {{-- settings --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('settings.index') }}"><img
                        src="{{ URL::asset('assets/img/svgicons/setting.png') }}" class="side-menu__icon"
                        alt=""><span class="side-menu__label">{{ trans('tests.Settings') }}</span></a>
            </li>
        </ul>
