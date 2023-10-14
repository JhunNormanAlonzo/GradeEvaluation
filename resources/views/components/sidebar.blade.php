  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

    @php
        $dashboard_route = "";
        if (Auth::user()->getRoleNames()->first() == "Admin") {
            $dashboard_route = "admin.dashboard.index";
        }else if(Auth::user()->getRoleNames()->first() == "Teacher"){
            $dashboard_route = "#";
        }else if(Auth::user()->getRoleNames()->first() == "Student"){
            $dashboard_route = "#";
        }
    @endphp
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route($dashboard_route)}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="img-fluid" src="{{asset('Template/img/OCC_LOGO.png')}}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Grade Evaluation</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route($dashboard_route)}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.user.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Year Level</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Year Level</h6>
                <a class="collapse-item" href="{{route('admin.year-level.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.year-level.index')}}">View All</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>SchoolYear</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">School Year:</h6>
                <a class="collapse-item" href="#">Create</a>
                <a class="collapse-item" href="#">View All</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#semester"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-university"></i>
            <span>Semester</span>
        </a>
        <div id="semester" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Semester:</h6>
                <a class="collapse-item" href="{{route('admin.semester.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.semester.index')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subject"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-book"></i>
            <span>Subject</span>
        </a>
        <div id="subject" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subject:</h6>
                <a class="collapse-item" href="{{route('admin.subject.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.subject.index')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#curriculumn"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book-reader fa-book"></i>
            <span>Curriculum</span>
        </a>
        <div id="curriculumn" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Curriculumn:</h6>
                <a class="collapse-item" href="{{route('admin.curriculumn.create')}}">Set</a>
                <a class="collapse-item" href="{{route('admin.curriculumn.index')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#section"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-laptop-code"></i>
            <span>Section</span>
        </a>
        <div id="section" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Section:</h6>
                <a class="collapse-item" href="{{route('admin.section.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.section.index')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user"></i>
            <span>Student</span>
        </a>
        <div id="student" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Student:</h6>
                <a class="collapse-item" href="{{route('admin.student.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.student.index')}}">View All</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacher"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user-graduate"></i>
            <span>Teacher</span>
        </a>
        <div id="teacher" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Teacher:</h6>
                <a class="collapse-item" href="{{route('admin.teacher.create')}}">Create</a>
                <a class="collapse-item" href="{{route('admin.teacher.index')}}">View All</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
