<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Mesin extends CI_Model
{
    private $_table = "md_mesin";

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }
}
