<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBaruJig extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_jig');
        $this->load->model('model_mesin');
        $this->load->model('model_line');
        $this->load->library('upload');

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
            'mesin' => $this->model_mesin->getAll(),
            'line' => $this->model_line->getAll()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/newjigdata', $data);
    }

    // public function inputdata()
    // {
    //     // Ambil nilai kode Jig dari inputan form
    //     $codeJig = $this->input->post('CodeJig');

    //     // Lakukan pengecekan apakah kode Jig sudah ada di database
    //     if ($this->model_jig->is_code_jig_exists($codeJig)) {
    //         // Jika kode Jig sudah ada, simpan pesan kesalahan di session
    //         $this->session->set_flashdata('error_message', 'Kode Jig sudah ada dalam database');
    //     } else {
    //         // Jika kode Jig belum ada, lanjutkan proses penyimpanan data
    //         $data = array(
    //             'CodeJig' => $codeJig,
    //             'DetailJig' => $this->input->post('DetailJig'),
    //             'GambarJig' => $_FILES['GambarJig']['name'],
    //             'Mesin' => $this->input->post('Mesin'),
    //             'Lokasi' => $this->input->post('Lokasi'),
    //             'A' => $this->input->post('A'),
    //             'B' => $this->input->post('B'),
    //             'C' => $this->input->post('C'),
    //             'D' => $this->input->post('D'),
    //             'E' => $this->input->post('E'),
    //             'F' => $this->input->post('F'),
    //             'G' => $this->input->post('G'),
    //             'H' => $this->input->post('H'),
    //             'I' => $this->input->post('I'),
    //             'J' => $this->input->post('J'),
    //             'D1' => $this->input->post('D1'),
    //             'D2' => $this->input->post('D2'),
    //             'D3' => $this->input->post('D3'),
    //             'D4' => $this->input->post('D4'),
    //             'D5' => $this->input->post('D5'),
    //             'D6' => $this->input->post('D6'),
    //             'D7' => $this->input->post('D7'),
    //             'D8' => $this->input->post('D8'),
    //             'Status' => 1
    //         );

    //         $result = $this->model_jig->insert_jig($data);

    //         if ($result) {
    //             // Jika data berhasil disimpan, tampilkan notifikasi SweetAlert
    //             $this->session->set_flashdata('success_message', 'Data Jig berhasil disimpan');
    //         } else {
    //             // Jika terjadi kesalahan, tampilkan notifikasi SweetAlert
    //             $this->session->set_flashdata('error_message', 'Terjadi kesalahan saat menyimpan data');
    //         }
    //     }

    //     // Lakukan redirect setelah semua proses selesai
    //     redirect('DataBaruJig');
    // }

    public function inputdata()
    {
        $codeJig = $this->input->post('CodeJig');

        // Lakukan pengecekan apakah kode Jig sudah ada di database
        if ($this->model_jig->is_code_jig_exists($codeJig)) {
            // Jika kode Jig sudah ada, tampilkan pesan kesalahan
            $this->session->set_flashdata('error_message', 'Kode Jig sudah ada dalam database');
            redirect('DataBaruJig');
        }

        $data = array(
            // 'CodeJig' => $this->input->post('CodeJig'),
            'CodeJig' => $codeJig,
            'DetailJig' => $this->input->post('DetailJig'),
            'GambarJig' => $_FILES['GambarJig']['name'],
            'Mesin' => $this->input->post('Mesin'),
            'Lokasi' => $this->input->post('Lokasi'),
            'A' => $this->input->post('A'),
            'B' => $this->input->post('B'),
            'C' => $this->input->post('C'),
            'D' => $this->input->post('D'),
            'E' => $this->input->post('E'),
            'F' => $this->input->post('F'),
            'G' => $this->input->post('G'),
            'H' => $this->input->post('H'),
            'I' => $this->input->post('I'),
            'J' => $this->input->post('J'),
            'D1' => $this->input->post('D1'),
            'D2' => $this->input->post('D2'),
            'D3' => $this->input->post('D3'),
            'D4' => $this->input->post('D4'),
            'D5' => $this->input->post('D5'),
            'D6' => $this->input->post('D6'),
            'D7' => $this->input->post('D7'),
            'D8' => $this->input->post('D8'),
            'Status' => 1
        );

        $result = $this->model_jig->insert_jig($data);

        if ($result) {
            // Jika data berhasil disimpan, tampilkan notifikasi SweetAlert
            $this->session->set_flashdata('success_message', 'Data Jig berhasil disimpan');
        } else {
            // Jika terjadi kesalahan, tampilkan notifikasi SweetAlert
            $this->session->set_flashdata('error_message', 'Terjadi kesalahan saat menyimpan data');
        }
        redirect('DataBaruJig');
    }
}
