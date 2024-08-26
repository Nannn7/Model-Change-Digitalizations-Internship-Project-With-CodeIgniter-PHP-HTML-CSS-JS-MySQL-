<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qty_Hasilukur extends CI_Controller
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
            'dyongo' => $this->model_ongoing->getDYByID(),
            'gmdata' => $this->model_gantimodel->getAll(),
        ];
        $this->load->view('Template/header_operatorqty', $data);
        $this->load->view('OperatorQty/hasilukur');
    }

    public function ListGMOnGoing()
    {
        $idGM = $this->input->post('idGM');

        $data = $this->model_ongoing->getGM($idGM);
        echo json_encode($data);
    }

    public function editfilegm()
    {
        $idGM = $this->input->post('idgmEditFile');

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
        $config['max_size'] = 102400;
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_editgm')) {
            $file_data = $this->upload->data();
            $file_editgm = $file_data['file_name'];
        } else {
            echo $this->upload->display_errors();
            return;
        }

        $data = array(
            'id' => $idGM,
            'file' => $file_editgm
        );


        $this->model_ongoing->updateFileGM($idGM, $data);
        redirect(site_url('Qty_Hasilukur'));
    }
}
