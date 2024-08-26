<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Product extends CI_Model
{
    private $_table = "md_product";

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getLine()
    {
        $this->db->order_by('id', 'asc');
        $this->db->group_by(['line']);
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table)->result();
    }

    public function getProductsByLine($line)
    {
        $this->db->where('line', $line);
        return $this->db->get($this->_table)->result_array();
    }

    public function getProdukByLine($lineDY)
    {
        $this->db->where('line', $lineDY);
        return $this->db->get($this->_table)->result_array();
    }

    public function search_product($search)
    {
        $this->db->select('nama_produk');
        $this->db->like('nama_produk', $search);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $id = $post["id"];
        $product = $this->getByID($id);

        $data = array(
            'line' => $post["line"],
            'nama_produk' => $post["nama_produk"],
            'status_produk' => $post["status_produk"]
        );

        if ($post["operation"] == "edit") {
            $data['status_produk'] = "1";

            $result = $this->db->update($this->_table, $data, array('id' => $id));
        } else {
            $data['status_produk'] = "1";

            $result = $this->db->insert($this->_table, $data);
        }

        return $result;
    }

    public function statusEdit()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $product = $this->getByID($id);
        $data = array();

        $data['line'] = $product[0]->line;
        $data['nama_produk'] = $product[0]->nama_produk;

        if ($product[0]->status_produk == 0) {
            $data['status_produk'] = 1;
        } else {
            $data['status_produk'] = 0;
        }

        return $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table);
    }
}
