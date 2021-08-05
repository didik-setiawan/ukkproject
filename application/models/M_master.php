<?php
defined('BASEPATH') or exit('No dirrect script access allowed');
class M_master extends CI_Model
{

    public function add_petugas()
    {
        if ($this->input->post('level') == 1) {
            $kategori = 0;
        } else {
            $kategori = $this->input->post('kategori');
        }
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => md5(htmlspecialchars($this->input->post('password'))),
            'telp' => htmlspecialchars($this->input->post('telp')),
            'level' => htmlspecialchars($this->input->post('level')),
            'id_kategori' => $kategori
        ];

        if ($this->db->insert('tb_admin', $data)) {
            $this->session->set_flashdata('berhasil', 'Akun petugas baru berhasil di buat');
            redirect('master/petugas');
        } else {
            $this->session->set_flashdata('gagal', 'Akun petugas baru gagal di buat');
            redirect('master/petugas');
        }
    }

    public function get_All_Petugas()
    {
        // $this->db->order_by('nama', 'ASC');
        // return $this->db->get_where('tb_admin', ['level' => 2])->result();
        $query = "SELECT * FROM tb_admin JOIN tbl_kategori ON tb_admin.id_kategori = tbl_kategori.id_kategori ORDER BY tb_admin.nama ASC";
        return $this->db->query($query)->result();
    }

    public function del_petugas($id)
    {
        if ($this->db->delete('tb_admin', ['md5(id_admin)' => $id])) {
            $this->db->delete('tb_tanggapan', ['md5(id_admin)' => $id]);
            $this->session->set_flashdata('berhasil', 'Akun petugas berhasil di hapus');
            redirect('master/petugas');
        } else {
            $this->session->set_flashdata('gagal', 'Akun petugas gagal di hapus');
            redirect('master/petugas');
        }
    }

    public function get_All_Masyarakat()
    {
        $this->db->order_by('nik', 'ASC');
        return $this->db->get('tb_masyarakat')->result();
    }

    public function get_masyarakat_id($id)
    {
        return $this->db->get_where('tb_masyarakat', ['md5(id_masyarakat)' => $id])->row();
    }

    public function del_masyarakat($id)
    {
        if ($this->db->delete('tb_masyarakat', ['md5(id_masyarakat)' => $id])) {
            $this->db->delete('tb_pengaduan', ['md5(id_masyarakat)' => $id]);
            $this->session->set_flashdata('berhasil', 'Akun masyarakat berhasil di hapus');
            redirect('master/masyarakat');
        } else {
            $this->session->set_flashdata('gagal', 'Akun masyarakat gagal di hapus');
            redirect('master/masyarakat');
        }
    }

    public function aktif_masyarakat($id)
    {
        $this->db->set('aktif', 1);
        $this->db->where('md5(id_masyarakat)', $id);
        if ($this->db->update('tb_masyarakat')) {
            $this->session->set_flashdata('berhasil', 'Akun masyarakat berhasil di aktfikan');
            redirect('master/masyarakat');
        } else {
            $this->session->set_flashdata('gagal', 'Akun masyarakat gagal di aktifkan');
            redirect('master/masyarakat');
        }
    }

    public function nonaktif_masyarakat($id)
    {
        $this->db->set('aktif', 0);
        $this->db->where('md5(id_masyarakat)', $id);
        if ($this->db->update('tb_masyarakat')) {
            $this->session->set_flashdata('berhasil', 'Akun masyarakat berhasil di nonaktfikan');
            redirect('master/masyarakat');
        } else {
            $this->session->set_flashdata('gagal', 'Akun masyarakat gagal di nonaktifkan');
            redirect('master/masyarakat');
        }
    }



    // Untuk management Pengaduan

    public function get_pengaduan_join_masyarakat()
    {
        $query = "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat ORDER BY tb_pengaduan.id_pengaduan DESC";
        return $this->db->query($query)->result();
    }

    public function get_pengaduan_id($id)
    {
        $p = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row();
        $query = "SELECT tb_masyarakat.*, tb_pengaduan.*, tbl_kategori.* FROM tb_masyarakat, tb_pengaduan, tbl_kategori WHERE tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat AND tb_pengaduan.id_kategori = tbl_kategori.id_kategori AND tb_pengaduan.id_pengaduan = $p->id_pengaduan";
        return $this->db->query($query)->row();
    }

    public function get_pengaduan_by_kategori($kategori)
    {
        $query = "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat WHERE tb_pengaduan.id_kategori = $kategori ORDER BY tb_pengaduan.id_pengaduan DESC";
        return $this->db->query($query)->result();
    }


    public function add_tanggapan($id, $id_admin)
    {
        $aidi = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->id_pengaduan;
        $data = [
            'id_tanggapan' => time(),
            'id_pengaduan' => $aidi,
            'isi_tanggapan' => htmlspecialchars($this->input->post('tanggapan')),
            'id_admin' => $id_admin
        ];

        if ($this->db->insert('tb_tanggapan', $data)) {
            $this->session->set_flashdata('berhasil', 'Tanggapan berhasil di tambahkan');
            redirect('pengaduan/detail/' . $id);
        } else {
            $this->session->set_flashdata('gagal', 'Tanggapan gagal di tambahkan');
            redirect('pengaduan/detail/' . $id);
        }
    }

    public function get_tanggapan_id($id)
    {
        $p_id = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->id_pengaduan;

        $query = "SELECT * FROM tb_tanggapan INNER JOIN tb_admin ON tb_tanggapan.id_admin = tb_admin.id_admin WHERE tb_tanggapan.id_pengaduan = $p_id";
        return $this->db->query($query)->result();
    }

    public function edit_status($id, $id_petugas)
    {
        $id_masyarakat = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->id_masyarakat;
        $nama_masyarakat = $this->db->get_where('tb_masyarakat', ['id_masyarakat' => $id_masyarakat])->row()->nama;
        $this->db->set('status', 1);
        $this->db->where('md5(id_pengaduan)', $id);
        if ($this->db->update('tb_pengaduan')) {
            $data = [
                'dari' => $id_petugas,
                'kepada' => $id_masyarakat,
                'isi_notifikasi' => "Hi $nama_masyarakat, laporan pengaduan anda sudah kami terima. Selanjutnya kami akan memproses laporan pengaduan anda.",
                'status' => 0,
                'tanggal' => time()
            ];
            $this->db->insert('tbl_notifikasi', $data);
            $this->session->set_flashdata('berhasil', 'Pengaduan di terima');
            redirect('pengaduan/detail/' . $id);
        } else {
            $this->session->set_flashdata('gagal', 'Pengaduan gagal di terima');
            redirect('pengaduan/detail/' . $id);
        }
    }

    public function delete_pengaduan($id)
    {
        $foto = $this->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row()->foto;

        unlink(FCPATH . 'asset/upload/' . $foto);
        if ($this->db->delete('tb_pengaduan', ['md5(id_pengaduan)' => $id])) {
            $this->db->delete('tb_tanggapan', ['md5(id_pengaduan)' => $id]);
            $this->session->set_flashdata('berhasil', 'Pengaduan berhasil di hapus');
            redirect('pengaduan');
        } else {
            $this->session->set_flashdata('gagal', 'Pengaduan gagal di hapus');
            redirect('pengaduan');
        }
    }

    public function del_tanggapan($id, $url)
    {
        if ($this->db->delete('tb_tanggapan', ['md5(id_tanggapan)' => $id])) {
            redirect('pengaduan/detail/' . $url);
        } else {
            $this->session->set_flashdata('gagal', 'Tanggapan gagal di hapus');
            redirect('pengaduan/detail/' . $url);
        }
    }


    // untuk management data kategori

    public function add_kategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->input->post('kategori'))
        ];
        if ($this->db->insert('tbl_kategori', $data)) {
            $this->session->set_flashdata('berhasil', 'Kategori berhasil di tambahkan');
            redirect('master/kategori/');
        } else {
            $this->session->set_flashdata('gagal', 'Kategori gagal di tambahkan');
            redirect('master/kategori/');
        }
    }

    public function get_kategori()
    {
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get('tbl_kategori')->result();
    }


    public function get_kategori_id($id)
    {
        return $this->db->get_where('tbl_kategori', ['md5(id_kategori)' => $id])->row();
    }

    public function edit_kategori($id)
    {
        $this->db->set('nama_kategori', htmlspecialchars($this->input->post('kategori')));
        $this->db->where('md5(id_kategori)', $id);
        if ($this->db->update('tbl_kategori')) {
            $this->session->set_flashdata('berhasil', 'Kategori berhasil di edit');
            redirect('master/kategori/');
        } else {
            $this->session->set_flashdata('gagal', 'Kategori gagal di edit');
            redirect('master/kategori/');
        }
    }

    public function del_kategori($id)
    {
        if ($this->db->delete('tbl_kategori', ['md5(id_kategori)' => $id])) {
            $this->db->delete('tb_admin', ['md5(id_kategori)' => $id]);
            $this->db->delete('tb_pengaduan', ['md5(id_kategori)' => $id]);
            $this->session->set_flashdata('berhasil', 'Kategori berhasil di hapus');
            redirect('master/kategori/');
        } else {
            $this->session->set_flashdata('gagal', 'Kategori gagal di hapus');
            redirect('master/kategori/');
        }
    }
}
