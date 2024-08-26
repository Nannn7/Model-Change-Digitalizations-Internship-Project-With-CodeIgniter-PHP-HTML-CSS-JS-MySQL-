<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_User extends CI_Model
{
    private $_table = "app_user";

    public function getAll()
    {
        $this->db->get($this->_table)->result();
        $this->db->order_by('role');
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table)->result();
    }

    public function cekLogin($username)
    {
        $this->db->where(array('username' => $username));
        return $this->db->get($this->_table)->result();
    }

    public function is_role_5($username, $password)
    {
        // Lakukan pengecekan di database
        $this->db->select('role');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('app_user');

        // Jika data ditemukan, periksa peran pengguna
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->role == 5) {
                return true;
            }
        }
        return false;
    }

    public function save()
    {
        $post = $this->input->post();
        $id = $post["id"];
        $user = $this->getByID($id);

        $data = array(
            'nrp' => $post["nrp"],
            'nama' => $post["nama"],
            'username' => $post["username"],
            'role' => $post["role"],
            'status' => $post["status"]
        );

        // Jika pengguna mengisi kolom password
        if (!empty($post["password"])) {
            $data['password'] = $post["password"];
        }

        if ($post["operation"] == "edit") {
            // Jika operasi adalah edit, gunakan data password yang ada atau biarkan kosong jika tidak diubah
            $data['password'] = !empty($post["password"]) ? $post["password"] : $user[1]->password;
            $data['status'] = "1";

            $result = $this->db->update($this->_table, $data, array('id' => $id));
        } else {
            // Jika operasi adalah tambah, gunakan password default jika tidak diisi
            $data['password'] = !empty($post["password"]) ? $post["password"] : "fim@2023";
            $data['status'] = "1";

            $result = $this->db->insert($this->_table, $data);
        }

        return $result;
    }

    // public function save()
    // {
    //     $post = $this->input->post();
    //     $id = $post["id"];
    //     $user = $this->getByID($id);

    //     $data = array(
    //         'nrp' => $post["nrp"],
    //         'nama' => $post["nama"],
    //         'username' => $post["username"],
    //         'role' => $post["role"],
    //         'status' => $post["status"]
    //     );

    //     if ($post["operation"] == "edit") {
    //         // Jika operasi adalah edit, tambahkan data password
    //         $data['password'] = $user[1]->password;
    //         $data['status'] = "1";

    //         $result = $this->db->update($this->_table, $data, array('id' => $id));
    //     } else {
    //         // Jika operasi adalah tambah, set data password dan gunakan insert
    //         $data['password'] = "fim@2023";
    //         $data['status'] = "1";

    //         $result = $this->db->insert($this->_table, $data);
    //     }

    //     return $result;
    // }

    public function statusEdit()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $data = array();

        $user = $this->getByID($id);

        $data['nrp'] = $user[0]->nrp;
        $data['nama'] = $user[0]->nama;
        $data['username'] = $user[0]->username;
        $data['password'] = $user[0]->password;
        $data['role'] = $user[0]->role;

        if ($user[0]->status == 0) {   // tdk aktif
            $data['status'] = 1;
        } else {    // aktif
            $data['status'] = 0;
        }

        return $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table);
    }
}
