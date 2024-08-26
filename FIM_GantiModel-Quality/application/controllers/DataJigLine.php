<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataJigLine extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_jig');

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
            'jigline' => $this->model_jig->getJigInLine()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/linejigdata', $data);
    }
}
