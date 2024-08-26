<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GM_Preview extends CI_Controller
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
            if ($this->session->userdata('role') != 2) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | GM-QM Operator GM',
            'totalGM' => $this->model_gantimodel->getTotalGM(),
            'totalDY' => $this->model_ongoing->getTotalDY()
        ];
        $this->load->view('Template/header_operatorgm', $data);
        $this->load->view('OperatorGM/preview', $data);
    }

    public function previewGM()
    {
        $start_gm = $this->input->get('start_gm');
        $finish_gm = $this->input->get('finish_gm');

        if (empty($start_gm) or empty($finish_gm)) {
            $gmdata = $this->model_gantimodel->GMID();
            $label = 'Semua Data Ganti Model';
        } else {
            $gmdata = $this->model_gantimodel->viewByDate($start_gm, $finish_gm);
            $start_gm = date('d-m-Y', strtotime($start_gm));
            $finish_gm = date('d-m-Y', strtotime($finish_gm));
            $label = 'Periode Tanggal ' . $start_gm . 's/d' . $finish_gm;
        }
        $data = [
            'title' => 'PT. FIM | GM-QM Operator GM',
            'gmdata' => $gmdata,
            'label' => $label
        ];
        $this->load->view('Template/header_operatorgm', $data);
        $this->load->view('OperatorGM/previewGM', $data);
    }

    public function ListGMOnGoing()
    {
        $idGM = $this->input->post('idGM');

        $data = $this->model_ongoing->getGM($idGM);
        echo json_encode($data);
    }

    public function previewDY()
    {
        $start_ukur = $this->input->get('start_ukur');
        $finish_ukur = $this->input->get('finish_ukur');

        if (empty($start_ukur) or empty($finish_ukur)) {
            $dyongo = $this->model_ongoing->getDYByID();
            $label = 'Semua Data Daily';
        } else {
            $dyongo = $this->model_ongoing->viewByDate($start_ukur, $finish_ukur);
            $start_ukur = date('d-m-Y', strtotime($start_ukur));
            $finish_ukur = date('d-m-Y', strtotime($finish_ukur));
            $label = 'Periode Tanggal ' . $start_ukur . ' s/d ' . $finish_ukur;
        }
        $data = [
            'title' => 'PT. FIM | GM-QM Operator GM',
            'dyongo' => $dyongo,
            'label' => $label
        ];
        $this->load->view('Template/header_operatorgm', $data);
        $this->load->view('OperatorGM/previewDY', $data);
    }
}
