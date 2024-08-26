<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Ongoing extends CI_Model
{
    private $_table = "measurement";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getGMByID($id)
    {
        $this->db->where('id_gm', $id);
        return $this->db->get($this->_table)->result();
    }

    public function getDYByID()
    {
        $this->db->where('id_gm', '-')->where('id_dy', '-');
        $this->db->order_by('start_ukur', 'asc');
        // $this->db->group_by(['line', 'product']);
        return $this->db->get($this->_table)->result();
    }

    public function getGM($idGM)
    {
        $this->db->select('id_gm, line, product, ukur, status, start_ukur, on_ukur, finish_ukur, file, catatan');
        $this->db->from('measurement');
        $this->db->where('id_gm', $idGM);
        return $this->db->get()->result();
    }

    public function getAntrianGM()
    {
        $this->db->where('id_gm !=', '-');
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getAntrianDY()
    {
        $this->db->where('id_gm', '-')->where('id_dy', '-');
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getGMOnly($id_gm)
    {
        $this->db->select('id_gm, line, product, ukur, status, start_ukur, on_ukur, finish_ukur, file, catatan');
        $this->db->from('measurement');
        $this->db->where('id_gm', $id_gm);
        return $this->db->get()->result();
    }

    public function getDY($id, $line, $product)
    {
        $this->db->select('ukur, status, start_ukur, on_ukur, finish_ukur, file, catatan');
        $this->db->from('measurement');
        $this->db->where('id', $id)->where('line', $line)->where('product', $product);
        return $this->db->get()->result();
    }

    public function getTotalDY()
    {
        $this->db->where('id_gm', '-')->where('id_dy', '-')->where('finish_ukur IS NOT NULL');
        $builder = $this->db->get($this->_table);
        $totalData = $builder->num_rows();
        return $totalData;
    }

    public function getMeasurementsByGMID($id)
    {
        $this->db->where('id_gm', $id);
        return $this->db->get($this->_table)->result();
    }

    public function viewByDate($start_ukur, $finish_ukur)
    {
        $start_ukur = $this->db->escape($start_ukur);
        $finish_ukur = $this->db->escape($finish_ukur);

        $this->db->where('id_gm', '-')->where('id_dy', '-')->where('finish_ukur IS NOT NULL')->where('DATE(start_ukur) BETWEEN ' . $start_ukur . ' AND ' . $finish_ukur);
        return $this->db->get($this->_table)->result();
    }

    public function getDaily()
    {
        $this->db->where('id_gm', '-')->where('id_dy', '-');
        $this->db->group_by(['line', 'product']);
        return $this->db->get($this->_table)->result();
    }

    public function insertGM($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function insertDY($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows() > 0;
    }

    public function updateOnUkur($idGM, $data)
    {
        $this->db->where('id', $idGM);
        $this->db->update($this->_table, $data);
    }

    public function updateFinishUkur($idGMF, $data)
    {
        $this->db->where('id', $idGMF);
        $this->db->update($this->_table, $data);
    }

    public function updateDYOnUkur($idDY, $data)
    {
        $this->db->where('id', $idDY);
        $this->db->update($this->_table, $data);
    }

    public function updateDYFinishUkur($idDYF, $data)
    {
        $this->db->where('id', $idDYF);
        $this->db->update($this->_table, $data);
    }

    public function updateFileGM($idGM, $data)
    {
        $this->db->where('id', $idGM);
        $this->db->update($this->_table, $data);
    }

    public function deleteGMById($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete($this->_table);

        return $result;
    }

    public function deleteDYById($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete($this->_table);

        return $result;
    }
}
