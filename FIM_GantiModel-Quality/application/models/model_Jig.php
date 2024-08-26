<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Jig extends CI_Model
{
    private $_table = "md_jig";

    public function insert_jig($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function is_code_jig_exists($codeJig)
    {
        // Lakukan pencarian kode Jig dalam database
        $this->db->where('CodeJig', $codeJig);
        $query = $this->db->get('md_jig'); // Ganti 'nama_tabel' dengan nama tabel Anda

        // Jika terdapat hasil pencarian, kode Jig sudah ada
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getJigInLine()
    {
        // Menggabungkan tabel md_line untuk mendapatkan id line
        $this->db->select('md_jig.*');
        $this->db->from($this->_table);
        $this->db->join('md_line', 'md_line.nama_line = md_jig.Lokasi');

        // Menggabungkan tabel md_mesin untuk mendapatkan id mesin
        $this->db->join('md_mesin', 'md_mesin.namaMesin = md_jig.Mesin');

        // Menambahkan kondisi untuk lokasi bukan GM
        $this->db->where('md_jig.Lokasi !=', 'GM');

        // Mengurutkan berdasarkan urutan id pada table md_line, kemudian id_mesin
        $this->db->order_by('md_line.nama_line', 'ASC');
        $this->db->order_by('md_mesin.namaMesin', 'ASC');

        return $this->db->get()->result();
    }

    public function getJigInGM()
    {
        $this->db->where('Lokasi', 'GM');
        $this->db->order_by('CodeJig', 'desc');
        return $this->db->get($this->_table)->result();
    }
}
