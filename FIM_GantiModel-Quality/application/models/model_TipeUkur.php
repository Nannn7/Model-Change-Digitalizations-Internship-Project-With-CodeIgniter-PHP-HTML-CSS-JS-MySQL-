<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_TipeUkur extends CI_Model
{
    private $_table = "md_ukur";

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }
}
