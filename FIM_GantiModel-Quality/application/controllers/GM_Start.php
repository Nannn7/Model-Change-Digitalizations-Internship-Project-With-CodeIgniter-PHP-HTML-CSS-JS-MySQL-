<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GM_Start extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_line');
        $this->load->model('model_product');
        $this->load->model('model_gantimodel');
        $this->load->model('model_ongoing');
        $this->load->model('model_user');

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
            'line' => $this->model_product->getLine(),
            'produk' => $this->model_product->getAll(),
            'ganmod' => $this->model_gantimodel->getAll(),
            'stts' => $this->model_gantimodel->getStatusByIDGM(),
            'total_measurements' => $this->model_gantimodel->getTotalMeasurements()
        ];
        $this->load->view('Template/header_operatorgm', $data);
        $this->load->view('OperatorGM/startGM', $data);
    }

    public function detailUkur($id_gm)
    {
        $data = [
            'measure' => $this->model_ongoing->getGMOnly($id_gm)
        ];
        echo json_encode($data);
    }

    public function getProductsByLine()
    {
        $line = $this->input->post('line');
        $products = $this->model_product->getProductsByLine($line);
        echo json_encode($products);
    }

    public function validasiNilai()
    {
        // Ambil nilai line dan produk dari request POST
        $line = $this->input->post('line');
        $product = $this->input->post('product');

        // Lakukan validasi di sini
        $validation_result = $this->model_gantimodel->validate($line, $product);

        // Beri respons sesuai dengan hasil validasi
        if ($validation_result === true) {
            // Jika validasi berhasil, kembalikan 'valid'
            echo 'valid';
        } else {
            // Jika validasi gagal, kembalikan pesan kesalahan
            echo $validation_result;
        }
    }

    public function mulaiGM()
    {
        $data = array(
            'id_gm' => $this->input->post('id_gm'),
            'line' => $this->input->post('txtLine'),
            'product' => $this->input->post('txtProduct'),
            'start_gm' => $this->input->post('start_gm')
        );

        $result = $this->model_gantimodel->insertGM($data);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil disimpan.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan. Silakan coba lagi.'));
        }
    }

    public function deleteGM()
    {
        $user_del = $this->input->post('user_del');
        $pass_del = $this->input->post('pass_del');

        // Periksa apakah pengguna memiliki peran 5 dari database
        $is_valid_user = $this->model_gantimodel->DeleteByUser($user_del, $pass_del);

        if ($is_valid_user && $is_valid_user['role'] == 5) {
            // Jika pengguna memiliki peran 5, lanjutkan penghapusan data
            $id_gm_delete = $this->input->post('id_gm_delete');
            $data = array(
                'user_del' => $user_del,
                'pass_del' => $pass_del
            );
            $this->model_gantimodel->hapus_data_gm($id_gm_delete, $data);

            // Berikan respon ke AJAX
            $response['status'] = 'success';
            $response['message'] = 'Data GM Berhasil Dihapus';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Username atau password salah.';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function ListGMOnGoing()
    {
        $idGM = $this->input->post('idGM');

        $data = $this->model_ongoing->getGM($idGM);
        echo json_encode($data);
    }

    public function otentikasiQC()
    {
        // Mendapatkan nilai dari form
        $user_qc = $this->input->post('user_qc');
        $pass_qc = $this->input->post('pass_qc');

        // Validasi username dan password
        $user = $this->model_gantimodel->getUserByCredentials($user_qc, $pass_qc);

        if ($user && $user['role'] == 5) {
            // Simpan user_qc dan pass_qc ke dalam database
            $id_gm_qc = $this->input->post('id_gm_qc');
            $data = array(
                'user_qc' => $user_qc,
                'pass_qc' => $pass_qc
            );
            $this->model_gantimodel->updateQC($id_gm_qc, $data);

            // Berhasil, kirim respon JSON
            $response['status'] = 'success';
            $response['message'] = 'Autentikasi QC berhasil.';
        } else {
            // Gagal, kirim respon JSON
            $response['status'] = 'error';
            $response['message'] = 'Username atau password salah.';
        }

        // Mengirimkan respon JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function selesaiGM()
    {
        $id = $this->input->post('id_gm_selesai');
        $finish_gm = $this->input->post('finish_gm');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Lakukan validasi username dan password
        $is_valid_user = $this->model_gantimodel->validateUser($username, $password);

        if ($is_valid_user) {
            // Lakukan proses update
            $data = array(
                'id_gm' => $id,
                'finish_gm' => $finish_gm
            );

            $this->model_gantimodel->update($id, $data);

            // Redirect ke halaman GM_Start
            redirect(site_url('GM_Start'));
        } else {
            // Tampilkan pesan error jika ada kesalahan validasi
            echo "Terdapat kesalahan dalam validasi.";
        }
    }
}
