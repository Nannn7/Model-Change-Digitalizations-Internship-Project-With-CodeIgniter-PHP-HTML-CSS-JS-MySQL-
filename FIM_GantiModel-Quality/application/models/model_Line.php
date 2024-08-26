<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_Line extends CI_Model
{
    private $_table = "md_line";

    public function getAll()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $id = $post["id"];

        $data = array(
            'nama_line' => $post["nama_line"],
            'status_line' => $post["status_line"]
        );

        if ($post["operation"] == "edit") {
            $data['status_line'] = "1";

            $result = $this->db->update($this->_table, $data, array('id' => $id));
        } else {
            $data['status_line'] = "1";

            $result = $this->db->insert($this->_table, $data);
        }

        return $result;
    }

    public function statusEdit()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $line = $this->getByID($id);
        $data = array();

        $data['nama_line'] = $line[0]->nama_line;

        if ($line[0]->status_line == 0) {
            $data['status_line'] = 1;
        } else {
            $data['status_line'] = 0;
        }

        return $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table);
    }
}
