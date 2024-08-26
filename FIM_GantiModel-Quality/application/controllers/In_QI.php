<?php
defined('BASEPATH') or exit('No direct script access allowed');

class In_QI extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_line');
        $this->load->model('model_product');
        $this->load->model('model_tipeukur');
        $this->load->model('model_gantimodel');
        $this->load->model('model_ongoing');

        $this->load->library('session');
        if (!$this->session->userdata('id')) {
            redirect(site_url('Login'));
        } else {
            if ($this->session->userdata('role') != 4) {
                redirect(site_url('Login'));
            }
        }
    }

    public function index()
    {
        $data = [
            'title' => 'PT. FIM | IN QI',
            'line' => $this->model_product->getLine(),
            'produk' => $this->model_product->getAll(),
            'tipeukur' => $this->model_tipeukur->getAll(),
            'ganmod' => $this->model_gantimodel->getAll(),
            'stts' => $this->model_gantimodel->getStatusByIDGM(),
            'measuregm' => $this->model_ongoing->getAntrianGM(),
            'measuredy' => $this->model_ongoing->getAntrianDY()
        ];
        $this->load->view('Template/header_inqi', $data);
        $this->load->view('InQI/home', $data);
    }

    public function ListGMOnGoing()
    {
        $idGM = $this->input->post('idGM');

        $data = $this->model_ongoing->getGM($idGM);
        echo json_encode($data);
    }

    public function startUkurGM()
    {
        $id_gmUkur = $this->input->post('id_gmUkur');
        $lineUkur = $this->input->post('lineUkur');
        $produkUkur = $this->input->post('produkUkur');
        $tipeprosesUkur = $this->input->post('tipeprosesUkur');
        $startUkur = $this->input->post('startUkur');

        $data = array(
            'id_gm' => $id_gmUkur,
            'line' => $lineUkur,
            'product' => $produkUkur,
            'ukur' => $tipeprosesUkur,
            'start_ukur' => $startUkur
        );

        $result = $this->model_ongoing->insertGM($data);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil disimpan.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan. Silakan coba lagi.'));
        }
    }

    public function deleteGM()
    {
        $id = $this->input->post('id');

        // Lakukan operasi penghapusan data di sini
        $result = $this->model_ongoing->deleteGMById($id);

        // Beri respons berdasarkan hasil penghapusan
        $response = array();

        if ($result) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }

    public function deleteDY()
    {
        $id = $this->input->post('id');

        // Lakukan operasi penghapusan data di sini
        $result = $this->model_ongoing->deleteDYById($id);

        // Beri respons berdasarkan hasil penghapusan
        $response = array();

        if ($result) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        echo json_encode($response);
    }

    public function startdaily()
    {
        $lineDY = $this->input->post('lineDY');
        $produkDY = $this->input->post('produkDY');
        $ukurDY = $this->input->post('ukurDY');
        $start_ukur = $this->input->post('start_ukur');

        $data = array(
            'line' => $lineDY,
            'product' => $produkDY,
            'ukur' => $ukurDY,
            'start_ukur' => $start_ukur
        );

        $result = $this->model_ongoing->insertDY($data);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil disimpan.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan. Silakan coba lagi.'));
        }
    }

    public function getProdukByLine()
    {
        $lineDY = $this->input->post('lineDY');
        $produkDY = $this->model_product->getProdukByLine($lineDY);
        echo json_encode($produkDY);
    }
}
