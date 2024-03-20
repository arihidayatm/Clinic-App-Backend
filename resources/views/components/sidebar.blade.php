<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Klinik MAH</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <ul class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('dashboard') }}">General Dashboard</a>
            </ul>
            <ul class=''>
                <a class="nav-link"
                    href="{{ route('users.index') }}">Users</a>
            </ul>
            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-graphic"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                </ul>
            </li> --}}
            <li class="menu-header">Master Data</li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-home">
                    </i> <span>Organisasi</span>
                </a>
            </li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-users">
                    </i> <span>Pegawai</span>
                </a>
            </li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Ruangan</span>
                </a>
            </li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Tindakan</span>
                </a>
            </li>
            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('credits') }}"><i class="fas fa-heart">
                    </i> <span>Farmasi</span>
                </a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
