<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/iconsippalur.png') }}" alt="assets Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIP-PALUR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Menu Admin -->
                @if (auth()->user()->role == "superadmin")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">1</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Menu Kessos -->
                @if (auth()->user()->role == "superadmin" || 
                auth()->user()->role == "user" || 
                auth()->user()->role == "kessos" || 
                auth()->user()->role == "struktural")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Kessos
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/saranaibadah" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sarana Ibadah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/saranapendidikan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sarana Pendidikan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/saranakesehatan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sarana Kesehatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pkh" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DTKS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Menu Permasbang -->
                @if (auth()->user()->role == "superadmin" ||  
                auth()->user()->role == "user" || 
                auth()->user()->role == "permasbang" || 
                auth()->user()->role == "struktural")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Permasbang
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pbb" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PBB</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/fasosfasum" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PSU</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/posyandu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Posyandu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pkk" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PKK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pospin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pospin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Menu PemTrantibum -->
                @if (auth()->user()->role == "superadmin" || 
                auth()->user()->role == "user" || 
                auth()->user()->role == "pemtrantibum" || 
                auth()->user()->role == "struktural")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pem & Trantibum
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/ktp" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KTP</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/ksbrt" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KSB RT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ksbrw" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KSB RW</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Menu Sekretariat -->
                @if (auth()->user()->role == "superadmin" ||             
                auth()->user()->role == "user" || 
                auth()->user()->role == "sekret" || 
                auth()->user()->role == "struktural")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sekretariat
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->role == "superadmin" || 
                        auth()->user()->role == "sekret" ||
                        auth()->user()->role == "struktural")
                        <li class="nav-item">
                            <a href="/asn" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ASN</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tkk" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TKK</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/laporanpamor" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Harian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
        </nav>
    </div>
</aside>
