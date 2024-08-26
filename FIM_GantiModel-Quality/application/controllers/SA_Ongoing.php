<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SA_Ongoing extends CI_Controller
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
            if ($this->session->userdata('role') != 1) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | GM-QM SuperAdmin',
            'gmdata' => $this->model_gantimodel->getAll(),
            'ongoing' => $this->model_ongoing->getAll(),
            'dyongo' => $this->model_ongoing->getDYByID()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/ongoing', $data);
    }

    public function ListGMOnGoing()
    {
        $idGM = $this->input->post('idGM');

        $data = $this->model_ongoing->getGM($idGM);
        echo json_encode($data);
    }

    public function ListDYOnGoing()
    {
        $id = $this->input->post('id');
        $line = $this->input->post('line');
        $product = $this->input->post('product');

        $data = $this->model_ongoing->getDY($id, $line, $product);
        echo json_encode($data);
    }
}
