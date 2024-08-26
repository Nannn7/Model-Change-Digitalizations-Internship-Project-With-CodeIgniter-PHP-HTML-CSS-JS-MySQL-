<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SA_Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_product');

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
            'line' => $this->model_product->getLine(),
            'product' => $this->model_product->getAll()
        ];
        $this->load->view('Template/header_superadmin', $data);
        $this->load->view('Superadmin/product', $data);
    }

    public function get_product_suggestion()
    {
        $search = $this->input->post('query');
        $data = $this->model_product->search_product($search);
        echo json_encode($data);
    }

    public function tambahEdit()
    {
        $db = $this->model_product;
        $result = $db->save();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Menyimpan Data Product");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function editStatus()
    {
        $db = $this->model_product;
        $result = $db->statusEdit();

        if ($result > 0) {
            $this->session->set_flashdata("flash", "Mengubah Status Product");
            $this->sukses();
        } else {
            $this->gagal();
        }
    }

    public function deleteProduct()
    {
        $id = $this->input->post('id');
        $db = $this->model_product;
        $product = $db->delete($id);

        $response = ['success' => $product];

        return $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function sukses()
    {
        redirect(site_url('SA_Product/index'));
    }

    function gagal()
    {
        $this->session->set_flashdata("flash", "Data Product Gagal Di Simpan");
        $this->index();
    }
}
