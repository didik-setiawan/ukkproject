<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{

    public function add_to_token($token, $email, $username)
    {
        $data = [
            'username' => $username,
            'email' => $email,
            'token' => $token,
            'tanggal' => time()
        ];
        $this->db->insert('tbl_token', $data);
    }

    public function reset_password()
    {
        $password = md5(htmlspecialchars($this->input->post('new_password')));
        $username = $this->session->userdata('reset_password');

        $this->db->set('password', $password);
        $this->db->where('username', $username);
        if ($this->db->update('tb_masyarakat')) {
            $this->db->delete('tbl_token', ['username' => $username]);
            $this->session->unset_userdata('reset_password');
            $this->session->set_flashdata('berhasil', 'Password berhasil di reset');
            redirect('auth');
        } else {
            $this->session->unset_userdata('reset_password');
            $this->session->set_flashdata('gagal', 'Password gagal di reset');
            redirect('auth');
        }
    }
}
