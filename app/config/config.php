<?php
// Base URL - Adjust if your folder name is different
// Since using Laragon and localhost, it might be localhost/manajemensekolah/public or manajemensekolah.test
// Let's deduce relative to allow flexibility, or set a solid default.
// The user explicitly said "localhost", so likely: http://localhost/manajemensekolah/public
define('BASEURL', 'http://localhost/manajemensekolah/public');

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sekolah_db');
