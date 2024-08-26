<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SA_Line extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_line');

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
            'line' => $this->model_line->getAll()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/line', $data);
    }

    public function tambahEdit()
    {
        $db = $this->model_line;
        $result = $db->save();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Menyimpan Data Line");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function editStatus()
    {
        $db = $this->model_line;
        $result = $db->statusEdit();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Mengubah Status Line");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function deleteLine()
    {
        $id = $this->input->post('id');
        $db = $this->model_line;
        $line = $db->delete($id);

        $response = ['success' => $line];

        return $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function sukses()
    {
        redirect(site_url('SA_Line/index'));
    }

    function gagal()
    {
        $this->session->set_flashdata("flash", "Data Line Gagal Di Simpan");
        $this->index();
    }
}
