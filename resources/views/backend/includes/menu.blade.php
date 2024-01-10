<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Menu Options</li>
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Only for admin</li>

            <li class="side-nav-item {{ request()->is('admin/permissions*') ? 'menuitem-active' : '' }} {{ request()->is('admin/roles*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#RolePermission" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Role Management </span>
                </a>
                <div class="collapse" id="RolePermission">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('permissions.index') }}">Permission</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.index') }}">Role</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ request()->is('admin/designations*') ? 'menuitem-active' : '' }} {{ request()->is('admin/stuffs*') ? 'menuitem-active' : '' }} {{ request()->is('admin/users*') ? 'menuitem-active' : '' }} {{ request()->is('admin/admins*') ? 'menuitem-active' : '' }} {{ request()->is('admin/teachers*') ? 'menuitem-active' : '' }} {{ request()->is('admin/parents*') ? 'menuitem-active' : '' }} {{ request()->is('admin/students*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#userManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> User Management </span>
                </a>
                <div class="collapse" id="userManagement">
                    <ul class="side-nav-second-level">
                        <li class="{{ request()->is('admin/designations*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('designations.index') }}" class="{{ request()->is('admin/designations') || request()->is('admin/designations/*') ? 'active' : '' }}">Designations</a>
                        </li>
                        <li class="{{ request()->is('admin/users*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('users.index') }}" class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">User</a>
                        </li>
                        <li class="{{ request()->is('admin/admins*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admins.index') }}" class="{{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'active' : '' }}">Admin</a>
                        </li>
                        <li class="{{ request()->is('admin/teachers*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('teachers.index') }}" class="{{ request()->is('admin/teachers') || request()->is('admin/teachers/*') ? 'active' : '' }}">Teachers</a>
                        </li>
                        <li class="{{ request()->is('admin/parents*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('parents.index') }}" class="{{ request()->is('admin/parents') || request()->is('admin/parents/*') ? 'active' : '' }}">Parents</a>
                        </li>
                        <li class="{{ request()->is('admin/stuffs*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('stuffs.index') }}" class="{{ request()->is('admin/stuffs') || request()->is('admin/stuffs/*') ? 'active' : '' }}">Academic Stuffs</a>
                        </li>
                        <li class="{{ request()->is('admin/students*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('students.index') }}" class="{{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : '' }}">Student</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ request()->is('admin/student-groups*') ? 'menuitem-active' : '' }} {{ request()->is('admin/educational-stages*') ? 'menuitem-active' : '' }} {{ request()->is('admin/class-schedules*') ? 'menuitem-active' : '' }} {{ request()->is('admin/sections*') ? 'menuitem-active' : '' }} {{ request()->is('admin/academic-classes*') ? 'menuitem-active' : '' }} {{ request()->is('admin/subjects*') ? 'menuitem-active' : '' }} {{ request()->is('admin/routines*') ? 'menuitem-active' : '' }} {{ request()->is('admin/syllabuses*') ? 'menuitem-active' : '' }} {{ request()->is('admin/assignments*') ? 'menuitem-active' : '' }} {{ request()->is('admin/routines*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#academicManagement" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Academic Management </span>
                </a>
                <div class="collapse" id="academicManagement">
                    <ul class="side-nav-second-level">
                        <li class="{{ request()->is('admin/student-groups*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('student-groups.index') }}" class="{{ request()->is('admin/student-groups') || request()->is('admin/student-groups/*') ? 'active' : '' }}">Student Group</a>
                        </li>
                        <li class="{{ request()->is('admin/educational-stages*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('educational-stages.index') }}" class="{{ request()->is('admin/educational-stages') || request()->is('admin/educational-stages/*') ? 'active' : '' }}">Educational Stage</a>
                        </li>
                        <li class="{{ request()->is('admin/academic-years*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('academic-years.index') }}" class="{{ request()->is('admin/academic-years') || request()->is('admin/academic-years/*') ? 'active' : '' }}">Academic Year</a>
                        </li>
                        <li class="{{ request()->is('admin/class-schedules*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('class-schedules.index') }}" class="{{ request()->is('admin/class-schedules') || request()->is('admin/class-schedules/*') ? 'active' : '' }}">Class Schedule</a>
                        </li>
                        <li class="{{ request()->is('admin/sections*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('sections.index') }}" class="{{ request()->is('admin/sections') || request()->is('admin/sections/*') ? 'active' : '' }}">Section</a>
                        </li>
                        <li class="{{ request()->is('admin/academic-classes*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('academic-classes.index') }}" class="{{ request()->is('admin/academic-classes') || request()->is('admin/academic-classes/*') ? 'active' : '' }}"> Academic Class</a>
                        </li>
                        <li class="{{ request()->is('admin/subjects*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('subjects.index') }}" class="{{ request()->is('admin/subjects') || request()->is('admin/subjects/*') ? 'active' : '' }}">Subject</a>
                        </li>
                        <li class="{{ request()->is('admin/syllabuses*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('syllabuses.index') }}" class="{{ request()->is('admin/syllabuses') || request()->is('admin/syllabuses/*') ? 'active' : '' }}">Syllabus</a>
                        </li>
                        <li class="{{ request()->is('admin/assignments*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('assignments.index') }}" class="{{ request()->is('admin/assignments') || request()->is('admin/assignments/*') ? 'active' : '' }}">Assignments</a>
                        </li>
                        <li class="{{ request()->is('admin/routines*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('routines.index') }}" class="{{ request()->is('admin/routines') || request()->is('admin/routines/*') ? 'active' : '' }}">Routines</a>
                        </li>
                        <li class="{{ request()->is('admin/attendances*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('attendances.index') }}" class="{{ request()->is('admin/attendances') || request()->is('admin/attendances/*') ? 'active' : '' }}">Attendance</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ request()->is('admin/exams*') ? 'menuitem-active' : '' }} {{ request()->is('admin/exam-grades*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#examModule" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Exam Module </span>
                </a>
                <div class="collapse" id="examModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('exams.index') }}">Exam</a>
                        </li>
                        <li>
                            <a href="{{ route('exam-grades.index') }}">Exam Grade</a>
                        </li>
                        <li>
                            <a href="{{ route('exam-schedules.index') }}">Exam Schedule</a>
                        </li>
                        <li>
                            <a href="{{ route('exam-attendance.index') }}">Exam Attendance</a>
                        </li>
                        <li>
                            <a href="{{ route('exam-mark-distribution-types.index') }}">Mark Distribution Type</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ request()->is('admin/quran-fonts*') ? 'menuitem-active' : '' }} {{ request()->is('admin/quran-translations*') ? 'menuitem-active' : '' }} {{ request()->is('admin/quran-translation-providers*') ? 'menuitem-active' : '' }} {{ request()->is('admin/quran-chapters*') ? 'menuitem-active' : '' }} {{ request()->is('admin/quran-verses*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#quranModule" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Quran Module </span>
                </a>
                <div class="collapse" id="quranModule">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('quran-fonts.index') }}">Quran Font</a>
                        </li>
                        <li>
                            <a href="{{ route('quran-chapters.index') }}">Quran Chapters</a>
                        </li>
                        <li>
                            <a href="{{ route('quran-verses.index') }}">Quran Verses</a>
                        </li>
                        <li>
                            <a href="{{ route('quran-translation-providers.index') }}">Translation Provider</a>
                        </li>
                        <li>
                            <a href="{{ route('quran-translations.index') }}">Quran Translation</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item {{ request()->is('admin/settings*') ? 'menuitem-active' : '' }}">
                <a href="{{ route('settings.index') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Settings </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
