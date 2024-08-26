<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qty_CetakGM extends CI_Controller
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
            if ($this->session->userdata('role') != 3) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
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
        $this->load->view('Template/header_operatorqty', $data);
        $this->load->view('OperatorQty/cetakGM', $data);
    }

    public function gantimodel($id)
    {
        $this->load->library('dompdf_gen');
        $data = [
            // 'title' => 'PT. FIM | GM-QM SuperAdmin',
            'gmdata' => $this->model_gantimodel->getAll(),
            'gm' => $this->model_gantimodel->getGMByID($id),
            'measure' => $this->model_ongoing->getMeasurementsByGMID($id)
        ];
        // $this->load->view('Template/header_superadmin', $data);
        // $this->load->view('Superadmin/printgantimodel', $data);
        $this->load->view('OperatorQty/pdfGM', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $line = $this->model_gantimodel->getLineByGM($id);
        $product = $this->model_gantimodel->getProductByGM($id);
        $filename = 'Laporan GantiModel ' . $line . '-' . $product . '.pdf';

        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render($html);
        $this->dompdf->stream($filename, array('Attachment' => 0));
    }
}
