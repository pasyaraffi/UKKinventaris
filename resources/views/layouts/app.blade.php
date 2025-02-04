<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Styling Sidebar */
        .sidebar {
            background: linear-gradient(135deg, #000000, #0056b3);
            padding-top: 20px;
            height: 100vh;
            overflow-y: auto;
            position: fixed;
            width: 250px;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 1rem;
            padding: 12px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Styling Navbar */
        .navbar {
            background: white;
            border-bottom: 2px solid #ddd;
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            z-index: 1000;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }

        .navbar .nav-link {
            color: rgb(80, 80, 80);
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #007bff;
        }

        /* Styling Main Content */
        .content-wrapper {
            margin-left: 250px;
            padding: 80px 20px 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .content-wrapper h1 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #0056b3;
        }

        /* Responsive Sidebar */
        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .navbar {
                width: 100%;
                left: 0;
            }

            .content-wrapper {
                margin-left: 0;
                padding-top: 100px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="p-3 sidebar d-flex flex-column">
        <h4 class="mb-4 text-center text-white">Inventory</h4>
        <ul class="nav flex-column">
            @if(auth()->check() && auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kategori_asset.index', 'kategori_asset.create', 'kategori_asset.edit') ? 'active' : '' }}"
                    href="{{ route('kategori_asset.index') }}">
                    <i class="fas fa-cogs"></i> Kategori Asset
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('sub_kategori_asset.index', 'sub_kategori_asset.create', 'sub_kategori_asset.edit') ? 'active' : '' }}"
                    href="{{ route('sub_kategori_asset.index') }}">
                    <i class="fas fa-cogs"></i> Sub Kategori Asset
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('merk.index', 'merk.create', 'merk.edit') ? 'active' : '' }}"
                    href="{{ route('merk.index') }}">
                    <i class="fas fa-box"></i> Merk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('satuan.index', 'satuan.create', 'satuan.edit') ? 'active' : '' }}"
                    href="{{ route('satuan.index') }}">
                    <i class="fas fa-weight-hanging"></i> Satuan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('depresiasi.index', 'depresiasi.create', 'depresiasi.edit') ? 'active' : '' }}"
                    href="{{ route('depresiasi.index') }}">
                    <i class="fas fa-calendar-alt"></i> Depresiasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('master_barang.index', 'master_barang.create', 'master_barang.edit') ? 'active' : '' }}"
                    href="{{ route('master_barang.index') }}">
                    <i class="fas fa-archive"></i> Master Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('distributor.index', 'distributor.create', 'distributor.edit') ? 'active' : '' }}"
                    href="{{ route('distributor.index') }}">
                    <i class="fas fa-truck"></i> Distributor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('pengadaan.index', 'pengadaan.create', 'pengadaan.edit') ? 'active' : '' }}"
                    href="{{ route('pengadaan.index') }}">
                    <i class="fas fa-cart-plus"></i> Pengadaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('lokasi.index', 'lokasi.create', 'lokasi.edit') ? 'active' : '' }}"
                    href="{{ route('lokasi.index') }}">
                    <i class="fas fa-map-marker-alt"></i> Lokasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('mutasi_lokasi.index', 'mutasi_lokasi.create', 'mutasi_lokasi.edit') ? 'active' : '' }}"
                    href="{{ route('mutasi_lokasi.index') }}">
                    <i class="fas fa-exchange-alt"></i> Mutasi Lokasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('opname.index', 'opname.create', 'opname.edit') ? 'active' : '' }}"
                    href="{{ route('opname.index') }}">
                    <i class="fas fa-check-circle"></i> Opname
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('hitung_depresiasi.index', 'hitung_depresiasi.create', 'hitung_depresiasi.edit') ? 'active' : '' }}"
                    href="{{ route('hitung_depresiasi.index') }}">
                    <i class="fas fa-calculator"></i> Hitung Depresiasi
                </a>
            </li>
            @endif

            @if(auth()->check() && auth()->user()->role == 'user')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
                    href="{{ route('user.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.pengadaan') ? 'active' : '' }}"
                    href="{{ route('user.pengadaan') }}">
                    <i class="fas fa-shopping-cart"></i> Pengadaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.hitung_depresiasi') ? 'active' : '' }}"
                    href="{{ route('user.hitung_depresiasi') }}">
                    <i class="fas fa-calculator"></i> Hitung Depresiasi
                </a>
            </li>
            @endif

            <!-- Logout -->
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white btn btn-link nav-link">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
