<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
    }

    public function index()
    {
        $this->load->library('session');
        $this->session->sess_destroy();

        $data = [
            'title' => 'PT. FIM | GantiModel-Quality Login'
        ];
        $this->load->view('Template/header_blank', $data);
        $this->load->view('Auth/login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $this->model_user->cekLogin($username);

        $cek = 0;
        $msg = "Username Tidak Terdaftar, Silahkan Coba Akun Lain!";
        $role = -1;

        foreach ($data as $d) {
            if ($d->username == $username) {
                $cek = 1;
                $msg = "Selamat Datang";
                if ($d->password == $password) {
                    if ($d->status == 1) {
                        $cek = 1;
                        $role = $d->role;

                        if ($role == 1) $msg = "Selamat Datang SuperAdmin";
                        else if ($role == 2) $msg = "Selamat Datang Operator Ganti Model";
                        else if ($role == 3) $msg = "Selamat Datang Operator Quality";
                        else if ($role == 4) $msg = "Selamat Datang Di Menu In QI";

                        $session = array(
                            'id' => $d->id,
                            'nama' => $d->nama,
                            'username' => $d->username,
                            'role' => $d->role
                        );

                        $this->session->set_userdata($session);
                    } else {
                        $cek = -1;
                        $msg = "Maaf Akun Anda Tidak Aktif, Silahkan Hubungi Super Admin";
                    }
                } else {
                    $cek = -1;
                    $msg = "Maaf Password Anda Salah, Silahkan Coba Lagi";
                }
            } else {
                $cek = -1;
                $msg = "Maaf Username Anda Tidak Terdaftar, Silahkan Hubungi Super Admin";
            }
        }
        echo json_encode(array('cek' => $cek, 'msg' => $msg, 'role' => $role));
    }
}
