<div class="navbar-bg"></div>

<!-- Start app top navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">Histories</div>
                <div class="search-item">
                    <a href="#">How to Used HTML in Laravel</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="https://themeforest.net/user/admincraft/portfolio" target="_black">Admincraft Portfolio</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>

            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(Auth::user()->name) }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                <a href="features-activities.html" class="dropdown-item has-icon"><i class="fas fa-bolt"></i> Activities</a>
                <a href="features-settings.html" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!-- Start main left sidebar menu -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('index') }}">KOADIT</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('usersdashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
                <li class="menu-header">Themes</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-compass"></i> <span>Themes</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('theme.create') }}">Add New Theme</a></li>
                    <li><a href="{{ route('theme.index') }}">Manage Theme</a></li>
                    <li><a href="{{ route('themePreview') }}">View Theme</a></li>
                    <li><a href="{{ route('functionality.index') }}">Theme Functionality</a></li>
                </ul>
            </li>

            <li class="menu-header">Wish</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Wish</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">New Wish</a></li>

                    <li><a class="nav-link" href="layout-top-navigation.html">Manage Wish</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Media</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin-media-gallery.index') }}">All Media</a></li>
                    <li><a class="nav-link" href="{{ route('adminPhotoGallery') }}">Photos</a></li>
                    <li><a class="nav-link" href="{{ route('adminAudioGallery') }}">Audios</a></li>
                    <li><a class="nav-link" href="{{ route('adminVideoGallery') }}">Videos</a></li>

                </ul>
            </li>
             <li class="menu-header">Category</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.index') }}">Manage Category</a></li>
                </ul>
            </li>

            {{-- <li class="menu-header">Article</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Typewriter</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Manage Typewriter</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Articles</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Managed Article</a></li>

                </ul>
            </li> --}}




            <li class="menu-header">Settings</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Update Profile</a></li>
                    <li><a class="nav-link" href="components-article.html">Change Password</a></li>
                    <li><a class="nav-link" href="components-article.html">Message Us</a></li>
                </ul>
            </li>


             </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
        </div>
    </aside>
</div>
