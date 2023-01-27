 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3"> Admin Page </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}" target="_blank">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Go to website</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-category/*') ? 'collapse active':'collapsed' }}" href="#"  data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-category/*')  ? 'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/add-category') ? 'active':'' }}" href="{{ url('admin/add-category') }}">Add Category</a>
                <a class="collapse-item {{ Request::is('admin/category') || Request::is('admin/edit-category/*')  ? 'active':'' }}" href="{{ url('admin/category') }}">View Category</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/add-posts') || Request::is('admin/edit-post/*') ? 'collapse active':'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Posts</span>
        </a>
        <div id="collapseThree" class="collapse {{ Request::is('admin/posts') || Request::is('admin/add-posts') || Request::is('admin/edit-post/*')  ? 'show':'' }}" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/add-posts') ? 'active':'' }}" href="{{ url('admin/add-posts') }}">Add Post</a>
                <a class="collapse-item {{ Request::is('admin/posts') || Request::is('admin/edit-post/*')  ? 'active':'' }}" href="{{ url('admin/posts') }}">View Post</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Request::is('admin/users') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('admin/users') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

    {{-- <li class="nav-item ">
        <a class="nav-link" href="{{ url('admin/settings') }}">
            <i class="fas fa-users"></i>
            <span>Settings</span></a>
    </li> --}}
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
        <a class="nav-link " href="{{ url('admin/settings') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Settings</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->
