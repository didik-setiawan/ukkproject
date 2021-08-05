<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_admin extends CI_Model
{
    public function setting_name()
    {
        $this->db->set('nama', htmlspecialchars($this->input->post('nama')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_admin')) {
            $this->session->set_flashdata('berhasil', 'Nama berhasil di edit');
            redirect('admin/settings');
        } else {
            $this->session->set_flashdata('gagal', 'Nama gagal di edit');
            redirect('admin/settings');
        }
    }

    public function setting_phone()
    {
        $this->db->set('telp', htmlspecialchars($this->input->post('phone')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_admin')) {
            $this->session->set_flashdata('berhasil', 'No Telp berhasil di edit');
            redirect('admin/settings');
        } else {
            $this->session->set_flashdata('gagal', 'No Telp gagal di edit');
            redirect('admin/settings');
        }
    }

    public function setting_password()
    {
        $oldpass = htmlspecialchars($this->input->post('old_pass'));
        $newpass = htmlspecialchars($this->input->post('new_pass'));
        $adminpass = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row()->password;

        if ($oldpass != $newpass) {
            if ($adminpass == md5($oldpass)) {
                $password = md5($newpass);
            } else {
                $this->session->set_flashdata('gagal', 'Password lama salah');
                redirect('admin/setting_password');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Password baru tidak boleh sama dengan password baru');
            redirect('admin/setting_password');
        }

        $this->db->set('password', $password);
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_admin')) {
            $this->session->set_flashdata('berhasil', 'Password berhasil di edit');
            redirect('admin/settings');
        } else {
            $this->session->set_flashdata('gagal', 'Password gagal di edit');
            redirect('admin/settings');
        }
    }

    public function get_pengaduan_limit()
    {
        $this->db->limit(5);
        $this->db->order_by('id_pengaduan', 'DESC');
        return $this->db->get('tb_pengaduan')->result();
    }

    public function get_pengaduan_limit_by_kategori()
    {
        $this->db->limit(5);
        $this->db->order_by('id_pengaduan', 'DESC');
        return $this->db->get_where('tb_pengaduan', ['id_kategori' => $this->session->userdata('kategori')])->result();
    }
}
