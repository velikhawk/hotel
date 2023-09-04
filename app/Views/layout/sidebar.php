<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotel Admin <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Karyawan -->
    <li class="nav-item">
        <a class="nav-link" href="/profile">

            <i class="fas fa-fw  fa-user-circle"></i>
            <span>Karyawan</span></a>
    </li>

    <!-- Nav Item - Karyawan -->
    <li class="nav-item">
                <a class="nav-link collapsed" href="/hotel" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Hotel</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Hotel:</h6>
                        <a class="collapse-item" href="/hotel">Hotel</a>
                        <a class="collapse-item" href="/kamar">Kamar</a>
                        <a class="collapse-item" href="/tipekamar">Tipe Kamar</a>
                        <a class="collapse-item" href="/tamu">Tamu</a>
                        <a class="collapse-item" href="/checkin">Checkin</a>
                    </div>
                </div>
            </li>


    <!-- Nav Item - Portofolio -->
    <li class="nav-item">
        <a class="nav-link" href="/portofolio">

            <i class="fas fa-fw fa-file-alt"></i>
            <span>Portofolio</span></a>
    </li>

    <!-- Nav Item - Slider -->
    <li class="nav-item my-0">
        <a class="nav-link" href="/slider">

            <i class="fas fa-fw fa-image"></i>
            <span>Slider</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Seting
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

            <i class="fas fa-fw  fa-tools"></i>
            <span>Seting</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="/user"><i class="fas fa-user-friends"></i> User</a>
                <a class="collapse-item" href="/role"><i class="fas fa-shield-alt"></i> Role</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/login">

            <i class="fas  fa-fw  fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>