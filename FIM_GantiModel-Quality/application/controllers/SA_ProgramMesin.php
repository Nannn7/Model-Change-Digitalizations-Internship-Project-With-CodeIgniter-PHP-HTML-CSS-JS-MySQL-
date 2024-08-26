<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SA_ProgramMesin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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
        $this->load->view('Superadmin/programmesin');
    }
}
