<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_user extends CI_Model
{

    public function get_kategori()
    {
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get('tbl_kategori')->result();
    }

    public function add_pengaduan($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $image = $_FILES['foto'];
        if ($image) {
            $config['upload_path'] = './asset/upload/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '500';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $img = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('salah', 'Kesalahan saat upload foto, harap coba kembali');
                redirect('user/add_pengaduan');
            }
        }

        $data = [
            'id_pengaduan' => time(),
            'id_masyarakat' => $id,
            'isi_pengaduan' => htmlspecialchars($this->input->post('isi')),
            'foto' => $img,
            'status' => 0,
            'tanggal' => date('Y-m-d'),
            'id_kategori' => htmlspecialchars($this->input->post('kategori'))
        ];

        if ($this->db->insert('tb_pengaduan', $data)) {
            $this->session->set_flashdata('benar', 'Pengaduan berhasil di kirim');
            redirect('user');
        } else {
            $this->session->set_flashdata('salah', 'Pengaduan gagal di kirim');
            redirect('user');
        }
    }

    public function get_pengaduan_join_user($id)
    {
        $query = "SELECT tb_masyarakat.*, tb_pengaduan.*, tbl_kategori.* FROM tb_masyarakat, tb_pengaduan, tbl_kategori WHERE tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat AND tb_pengaduan.id_kategori = tbl_kategori.id_kategori AND tb_masyarakat.id_masyarakat = $id ORDER BY tb_pengaduan.id_pengaduan DESC";
        return $this->db->query($query)->result();
    }

    public function get_pengaduan_id($id, $id_masyarakat)
    {
        $id_pengaduan = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->id_pengaduan;
        $query = "SELECT tb_masyarakat.*, tb_pengaduan.*, tbl_kategori.* FROM tb_masyarakat, tb_pengaduan, tbl_kategori WHERE tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat AND tb_pengaduan.id_kategori = tbl_kategori.id_kategori AND tb_pengaduan.id_pengaduan = $id_pengaduan AND tb_pengaduan.id_masyarakat = $id_masyarakat";
        return $this->db->query($query)->row();
    }

    public function get_tanggapan($id)
    {
        $id_pengaduan = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->id_pengaduan;
        $query = "SELECT * FROM tb_tanggapan INNER JOIN tb_admin ON tb_tanggapan.id_admin = tb_admin.id_admin WHERE tb_tanggapan.id_pengaduan = $id_pengaduan";
        return $this->db->query($query)->result();
    }


    public function setting_name()
    {
        $this->db->set('nama', htmlspecialchars($this->input->post('nama')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_masyarakat')) {
            $this->session->set_flashdata('benar', 'Nama berhasil di edit');
            redirect('user/settings');
        } else {
            $this->session->set_flashdata('salah', 'Nama gagal di edit');
            redirect('user/settings');
        }
    }

    public function setting_phone()
    {
        $this->db->set('telp', htmlspecialchars($this->input->post('telp')));
        $this->db->set('kode_negara', $this->input->post('kode-negara'));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_masyarakat')) {
            $this->session->set_flashdata('benar', 'No telp berhasil di edit');
            redirect('user/settings');
        } else {
            $this->session->set_flashdata('salah', 'No telp gagal di edit');
            redirect('user/settings');
        }
    }

    public function setting_password()
    {
        $old_pass = htmlspecialchars($this->input->post('old_pass'));
        $new_pass = htmlspecialchars($this->input->post('new_pass'));
        $user_pass = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row()->password;

        if ($new_pass != $old_pass) {
            if (md5($old_pass) == $user_pass) {
                $password = md5($new_pass);
            } else {
                $this->session->set_flashdata('salah', 'Password lama salah');
                redirect('user/setting_password');
            }
        } else {
            $this->session->set_flashdata('salah', 'Password baru tidak boleh sama dengan Password lama');
            redirect('user/setting_password');
        }

        $this->db->set('password', $password);
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('tb_masyarakat')) {
            $this->session->set_flashdata('benar', 'Password berhasil di edit');
            redirect('user/settings');
        } else {
            $this->session->set_flashdata('salah', 'Password gagal di edit');
            redirect('user/settings');
        }
    }

    public function get_notifikasi($id_masyarakat)
    {
        $query = "SELECT * FROM tbl_notifikasi JOIN tb_admin ON tbl_notifikasi.dari = tb_admin.id_admin WHERE tbl_notifikasi.kepada = $id_masyarakat ORDER BY tbl_notifikasi.tanggal DESC";
        return $this->db->query($query)->result();
    }

    public function edit_status_notif($id_masyarakat)
    {
        $this->db->set('status', 1);
        $this->db->where('kepada', $id_masyarakat);
        return $this->db->update('tbl_notifikasi');
        redirect('user/notification');
    }
}
