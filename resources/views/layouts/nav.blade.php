<nav class="mt-2">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class='nav-icon fas fa-home'></i>
                <p>
                    Home

                </p>
            </a>
        </li>

        @if(Auth::user()->level == "admin")
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class='bx bxs-home'></i>
                <p>
                    Master
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class='bx bx-radio-circle'></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class='bx bx-radio-circle'></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien.index') }}" class="nav-link">
                        <i class='bx bx-radio-circle'></i>
                        <p>Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('resep.index') }}" class="nav-link">
                        <i class='bx bx-radio-circle'></i>
                        <p>Resep</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif


        @if(Auth::user()->level == "chef")
        <li class="nav-item">
            <a href="{{ route('module') }}" class="nav-link">
                <i class='bx bxs-widget'></i>
                <p>
                    Modules

                </p>
            </a>
        </li>
        @endif

        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" id="logout">
                @csrf
                <a class="nav-link" href="#" onclick="document.getElementById('logout').submit()">
                    <i class='bx bx-log-out'></i> Logout
                </a>
            </form>
        </li>
    </ul>
</nav>