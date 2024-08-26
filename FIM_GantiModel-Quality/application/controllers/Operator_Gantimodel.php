<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_Gantimodel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_gantimodel');
        $this->load->model('model_ongoing');

        $this->load->library('session');
        if (!$this->session->userdata('id')) {
            redirect(site_url('Login'));
        } else {
            if ($this->session->userdata('role') != 2) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | GM-QM Operator GM',
            'ganmod' => $this->model_gantimodel->getAll(),
            'stts' => $this->model_gantimodel->getStatusByIDGM()
        ];
        $this->load->view('Template/header_operatorgm', $data);
        $this->load->view('OperatorGM/home');
    }
}
