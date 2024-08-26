<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SA_User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');

        $this->load->library('session');
        if (!$this->session->userdata('id')) {
            redirect(site_url('Login'));
        } else {
            if ($this->session->userdata('role') != 1) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | GM-QM SuperAdmin',
            'user' => $this->model_user->getAll()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/user', $data);
    }

    public function tambahEdit()
    {
        $db = $this->model_user;
        $result = $db->save();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Menyimpan Data User");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function editStatus()
    {
        $db = $this->model_user;
        $result = $db->statusEdit();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Mengubah Status User");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function deleteUser()
    {
        $id = $this->input->post('id');
        $db = $this->model_user;
        $user = $db->delete($id);

        $response = ['success' => $user];

        return $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function sukses()
    {
        redirect(site_url('SA_User/index'));
    }

    function gagal()
    {
        $this->session->set_flashdata("flash", "Data User Gagal Di Simpan");
        $this->index();
    }
}
