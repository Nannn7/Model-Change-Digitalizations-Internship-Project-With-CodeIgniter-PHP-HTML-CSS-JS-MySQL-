<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_Quality extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_ongoing');
        $this->load->model('model_gantimodel');

        $this->load->library('session');
        if (!$this->session->userdata('id')) {
            redirect(site_url('Login'));
        } else {
            if ($this->session->userdata('role') != 3) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | GM-QM Operator Quality',
            'measure' => $this->model_ongoing->getData()
        ];
        $this->load->view('Template/header_operatorqty', $data);
        $this->load->view('OperatorQty/home');
    }
}
