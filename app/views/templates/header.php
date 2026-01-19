<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .sidebar a {
            color: #ccc;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-bottom: 1px solid #444;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .sidebar a.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;">
            <a href="<?= BASEURL; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Sekolah App</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= BASEURL; ?>" class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'], '/home') !== false || $_SERVER['REQUEST_URI'] == '/manajemensekolah/public/') ? 'active' : ''; ?>">
                        Dashboard
                    </a>
                </li>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <li class="nav-item dropdown">
                        <?php
                        $activeDataMaster = (strpos($_SERVER['REQUEST_URI'], '/siswa') !== false || strpos($_SERVER['REQUEST_URI'], '/kelas') !== false || strpos($_SERVER['REQUEST_URI'], '/mapel') !== false || strpos($_SERVER['REQUEST_URI'], '/guru') !== false || strpos($_SERVER['REQUEST_URI'], '/jampelajaran') !== false || strpos($_SERVER['REQUEST_URI'], '/jadwalkelas') !== false || strpos($_SERVER['REQUEST_URI'], '/jenispoin') !== false || strpos($_SERVER['REQUEST_URI'], '/laporan') !== false) ? 'active' : '';
                        $showDataMaster = (strpos($_SERVER['REQUEST_URI'], '/siswa') !== false || strpos($_SERVER['REQUEST_URI'], '/kelas') !== false || strpos($_SERVER['REQUEST_URI'], '/mapel') !== false || strpos($_SERVER['REQUEST_URI'], '/guru') !== false || strpos($_SERVER['REQUEST_URI'], '/jampelajaran') !== false || strpos($_SERVER['REQUEST_URI'], '/jadwalkelas') !== false || strpos($_SERVER['REQUEST_URI'], '/jenispoin') !== false || strpos($_SERVER['REQUEST_URI'], '/laporan') !== false) ? 'show' : '';
                        ?>
                        <a class="nav-link dropdown-toggle text-white <?= $activeDataMaster; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark <?= $showDataMaster; ?>" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/siswa') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/siswa">Manajemen Siswa</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/kelas') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/kelas">Manajemen Kelas</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/mapel') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/mapel">Manajemen Mapel</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/guru') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/guru">Manajemen Guru</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/jampelajaran') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/jampelajaran">Pengaturan Jam Pelajaran</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/jenispoin') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/jenispoin">Poin Prestasi & Pelanggaran</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/jadwalkelas') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/jadwalkelas">Jadwal Kelas</a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= (strpos($_SERVER['REQUEST_URI'], '/laporan') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/laporan">Laporan</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == 'guru') : ?>
                    <li class="nav-item">
                        <a href="<?= BASEURL; ?>/siswa" class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'], '/siswa') !== false) ? 'active' : ''; ?>">
                            Manajemen Siswa
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item mt-3">
                    <a href="<?= BASEURL; ?>/login/logout" class="nav-link text-white bg-danger">
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1">