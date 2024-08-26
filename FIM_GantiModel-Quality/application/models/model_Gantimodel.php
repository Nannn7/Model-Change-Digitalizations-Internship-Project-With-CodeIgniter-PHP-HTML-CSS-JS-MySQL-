<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Gantimodel extends CI_Model
{
    private $_table = "gantimodel";

    public function getAll()
    {
        $this->db->where('user_del', '');
        $this->db->where('pass_del', '');
        $this->db->order_by('id_gm', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getGMByID($id)
    {
        $this->db->where('id_gm', $id);
        return $this->db->get($this->_table)->result();
    }

    public function getLineByGM($id)
    {
        $this->db->select('line'); // Pilih kolom 'line' dari tabel
        $this->db->where('id_gm', $id); // Sesuaikan kondisi dengan id_gm yang diberikan
        return $this->db->get($this->_table)->row()->line; // Mengembalikan nilai tunggal line
    }

    public function getProductByGM($id)
    {
        $this->db->select('product'); // Pilih kolom 'product' dari tabel
        $this->db->where('id_gm', $id); // Sesuaikan kondisi dengan id_gm yang diberikan
        return $this->db->get($this->_table)->row()->product; // Mengembalikan nilai tunggal product
    }

    public function validate($line, $product)
    {
        // Periksa apakah sudah ada nilai line dan produk yang sama di tabel gantimodel
        // sebelum baris tersebut memiliki nilai pada kolom finish gm
        $this->db->where('line', $line);
        $this->db->where('product', $product);
        $this->db->where('finish_gm', NULL); // Atur kondisi sesuai dengan struktur tabel Anda

        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            // Jika ada hasil yang ditemukan, maka validasi gagal
            return 'Line dan produk yang sama sudah ada sebelumnya.';
        } else {
            // Jika tidak ada hasil yang ditemukan, maka validasi berhasil
            return true;
        }
    }

    public function GMID()
    {
        $this->db->order_by('start_gm', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function viewByDate($start_gm, $finish_gm)
    {
        $start_gm = $this->db->escape($start_gm);
        $finish_gm = $this->db->escape($finish_gm);

        $this->db->where('finish_gm IS NOT NULL')->where('DATE(start_gm) BETWEEN ' . $start_gm . ' AND ' . $finish_gm);
        return $this->db->get($this->_table)->result();
    }

    public function getTotalGM()
    {
        $this->db->where('finish_gm IS NOT NULL');
        $builder = $this->db->get($this->_table);
        $totalData = $builder->num_rows();
        return $totalData;
    }

    public function insertGM($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function getStatusByIDGM($id = false)
    {
        $this->db->select($this->_table . '.*, measurement.id_gm, measurement.status');
        $this->db->from($this->_table);
        $this->db->join('measurement', $this->_table . '.id_gm = measurement.id_gm', 'inner');

        if ($id != false) {
            $this->db->where($this->_table . '.id_gm', $id);
        }

        return $this->db->get()->result();
    }

    public function getTotalMeasurements()
    {
        $this->db->select('gantimodel.id_gm, COUNT(measurement.id_gm) as total_pengukuran');
        $this->db->from('gantimodel');
        $this->db->join('measurement', 'gantimodel.id_gm = measurement.id_gm', 'left');
        $this->db->group_by('gantimodel.id_gm');
        return $this->db->get()->result();
    }

    public function deleteGMById($id)
    {
        $this->db->where('id_gm', $id);
        $result = $this->db->delete($this->_table);

        return $result;
    }

    public function hapus_data_gm($id_gm, $data)
    {
        $this->db->where('id_gm', $id_gm);
        $this->db->update('gantimodel', $data);
    }

    public function getUserByCredentials($username, $password)
    {
        // Query untuk mendapatkan user berdasarkan username dan password
        $query = $this->db->get_where('app_user', array('username' => $username, 'password' => $password));
        return $query->row_array(); // Mengembalikan hasil query dalam bentuk array
    }

    public function DeleteByUser($user_del, $pass_del)
    {
        $query = $this->db->get_where('app_user', array('username' => $user_del, 'password' => $pass_del));
        return $query->row_array();
    }

    public function validateUser($username, $password)
    {
        $query = $this->db->get_where('app_user', array('username' => $username, 'password' => $password, 'role' => 5));

        return $query->num_rows() > 0;
    }

    public function updateQC($id_gm, $data)
    {
        // Update user_qc dan pass_qc berdasarkan id_gm
        $this->db->where('id_gm', $id_gm);
        $this->db->update('gantimodel', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_gm', $id);
        $this->db->update($this->_table, $data);
    }
}
