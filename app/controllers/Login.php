<?php

class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('login/index', $data);
    }

    public function process()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model('UserModel')->getUserByUsername($username);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

                    header('Location: ' . BASEURL);
                    exit;
                }
            }

            Flasher::setFlash('gagal', 'Login gagal, periksa username atau password', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
