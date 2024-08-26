<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_DY extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_ongoing');

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
        $start_ukur = $this->input->get('start_ukur');
        $finish_ukur = $this->input->get('finish_ukur');

        if (empty($start_ukur) or empty($finish_ukur)) {
            $daily = $this->model_ongoing->getDYByID();
            $url_cetak = 'Cetak_DY/pdfcetak';
            $label = 'Semua Data Daily';
        } else {
            $daily = $this->model_ongoing->viewByDate($start_ukur, $finish_ukur);
            $url_cetak = 'Cetak_DY/pdfcetak?start_ukur=' . $start_ukur . '&finish_ukur=' . $finish_ukur;
            $start_ukur = date('d-m-Y', strtotime($start_ukur));
            $finish_ukur = date('d-m-Y', strtotime($finish_ukur));
            $label = 'Periode Tanggal ' . $start_ukur . ' s/d ' . $finish_ukur;
        }
        $data = [
            'title' => 'PT. FIM | GM-QM SuperAdmin',
            'daily' => $daily,
            'url_cetak' => base_url($url_cetak),
            'label' => $label
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/cetakDY', $data);
    }

    public function pdfcetak()
    {
        $start_ukur = $this->input->get('start_ukur');
        $finish_ukur = $this->input->get('finish_ukur');

        if (empty($start_ukur) or empty($finish_ukur)) {
            $daily = $this->model_ongoing->getDYByID();
            $day = $this->model_ongoing->getDaily();
            $label = 'Semua Data Daily';
        } else {
            $daily = $this->model_ongoing->viewByDate($start_ukur, $finish_ukur);
            $day = $this->model_ongoing->getDaily();
            $start_ukur = date('d-m-Y', strtotime($start_ukur));
            $finish_ukur = date('d-m-Y', strtotime($finish_ukur));
            $label = 'Periode Tanggal ' . $start_ukur . ' s/d ' . $finish_ukur;
        }

        $data = [
            'label' => $label,
            'daily' => $daily,
            'day' => $day
        ];

        ob_start();
        $this->load->view('Superadmin/pdfDY', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/plugins/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('landscape', 'A4', 'en');
        $pdf->writeHTML($html);
        $pdf->output('Laporan Daily Check.pdf', 'D');
    }
}
