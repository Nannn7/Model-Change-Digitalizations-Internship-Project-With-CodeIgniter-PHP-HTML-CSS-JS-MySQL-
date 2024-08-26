<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qty_Ongoing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data = [
            'title' => 'PT. FIM | GM-QM Operator Quality',
            'measure' => $this->model_ongoing->getData()
        ];
        $this->load->view('Template/header_operatorqty', $data);
        $this->load->view('OperatorQty/ongoing');
    }

    public function GMstartOnUkur()
    {
        $idGM = $this->input->post('idGM');
        $on_ukur_gm = $this->input->post('on_ukur_gm');

        $data = array(
            'id' => $idGM,
            'on_ukur' => $on_ukur_gm
        );

        $this->model_ongoing->updateOnUkur($idGM, $data);
        redirect(site_url('Qty_Ongoing'));
    }

    public function GMfinishUkur()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hasilukur_finishukur', 'Hasil Ukur', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $idGMF = $this->input->post('idGMF');
            $hasilukur_finishukur = $this->input->post('hasilukur_finishukur');
            $catatan_finishukur = $this->input->post('catatan_finishukur');
            $gm_finishukur = $this->input->post('gm_finishukur');

            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
            $config['max_size'] = 102400;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_finishukur')) {
                $file_data = $this->upload->data();
                $file_finishukur = $file_data['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }

            $data = array(
                'id' => $idGMF,
                'status' => $hasilukur_finishukur,
                'file' => $file_finishukur,
                'catatan' => $catatan_finishukur,
                'finish_ukur' => $gm_finishukur
            );
        }

        $this->model_ongoing->updateFinishUkur($idGMF, $data);
        redirect(site_url('Qty_Ongoing'));
    }

    public function DYstartOnUkur()
    {
        $idDY = $this->input->post('idDY');
        $on_ukur_dy = $this->input->post('on_ukur_dy');

        $data = array(
            'id' => $idDY,
            'on_ukur' => $on_ukur_dy
        );

        $this->model_ongoing->updateDYOnUkur($idDY, $data);
        redirect(site_url('Qty_Ongoing'));
    }

    public function DYfinishUkur()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hasilukur_dy_finish', 'Hasil Ukur', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $idDYF = $this->input->post('idDYF');
            $hasilukur_dy_finish = $this->input->post('hasilukur_dy_finish');
            $catatan_dy_finish = $this->input->post('catatan_dy_finish');
            $finish_ukur_dy = $this->input->post('finish_ukur_dy');

            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
            $config['max_size'] = 102400;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_dy_finish')) {
                $file_data = $this->upload->data();
                $file_dy_finish = $file_data['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }

            $data = array(
                'id' => $idDYF,
                'status' => $hasilukur_dy_finish,
                'file' => $file_dy_finish,
                'catatan' => $catatan_dy_finish,
                'finish_ukur' => $finish_ukur_dy
            );
        }

        $this->model_ongoing->updateDYFinishUkur($idDYF, $data);
        redirect(site_url('Qty_Ongoing'));
    }
}
