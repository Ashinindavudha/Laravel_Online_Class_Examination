@inject('request', 'Illuminate\Http\Request')
<!-- Sidebar -->
<div class="sidebar" data-color="orange" data-background-color="white">
    <!-- Brand Logo -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper">
        <ul class="nav" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        <i class="fas fa-fw fa-tachometer-alt">

                        </i>
                        <span>{{ trans('global.dashboard') }}</span>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.tests.index') }}" class="nav-link {{ $request->segment(1) == 'tests' ? 'active' : '' }}">
                    <i class="fa-fw fas fa-user">

                    </i>
                    <span>{{ trans('cruds.test.title') }}</span>
                </a>
            </li>


            <li class="nav-item {{ $request->segment(1) == 'results' ? 'active' : '' }}">
                <a href="{{ route('admin.results.index') }}" class="nav-link {{ $request->segment(1) == 'subjects' ? 'active' : '' }}">
                    <i class="fa-fw fas fa-unlock-alt">

                    </i>
                    <span>{{ trans('cruds.result.title') }}</span>
                </a>
            </li>

            @if(Auth::user()->isAdmin())

            <li class="nav-item has-treeview">
                <a class="nav-link" data-toggle="collapse" href="#user_management">
                    <i class="fa-fw fas fa-users">

                    </i>
                    <p>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="user_management">
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="{{ route('admin.user_actions.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-user">

                                </i>
                                <span>{{ trans('cruds.user_action.title') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-user">

                                </i>
                                <span>{{ trans('cruds.user.title') }}</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('admin.subjects.index') }}" class="nav-link {{ $request->segment(1) == 'subjects' ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt">

                                </i>
                                <span>{{ trans('cruds.subject.title') }}</span>
                            </a>
                        </li>


                        <li class="nav-item {{ $request->segment(1) == 'questions' ? 'active' : '' }}">
                            <a href="{{ route('admin.questions.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.question.title') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ $request->segment(1) == 'questions_options' ? 'active' : '' }}">
                            <a href="{{ route('admin.question-options.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.questionOption.title') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.role.title') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.studentregisters.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.student_register.title') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.studentrolls.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.student_roll.title') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.coursesemesters.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.course_semester.title') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.academicyears.index') }}" class="nav-link">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.academic_year.title') }}</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <p>
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        <span>{{ trans('global.logout') }}</span>
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
