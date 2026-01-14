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
                <li>
                    <a href="<?= BASEURL; ?>/siswa" class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'], '/siswa') !== false) ? 'active' : ''; ?>">
                        Manajemen Siswa
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/kelas" class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'], '/kelas') !== false) ? 'active' : ''; ?>">
                        Manajemen Kelas
                    </a>
                </li>
                <li>
                    <a href="<?= BASEURL; ?>/mapel" class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'], '/mapel') !== false) ? 'active' : ''; ?>">
                        Manajemen Mapel
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1">