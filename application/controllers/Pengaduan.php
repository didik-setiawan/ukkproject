<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_admin();
        $this->load->model('M_master', 'master');
    }

    // Halaman Management Data pengaduan
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Management Pengaduan";
        if ($this->session->userdata('kategori') == 0) {
            $data['pengaduan'] = $this->master->get_pengaduan_join_masyarakat();
        } else {
            $data['pengaduan'] = $this->master->get_pengaduan_by_kategori($data['pengguna']->id_kategori);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pengaduan/index');
        $this->load->view('templates/footer');
    }

    // Halaman detail Pengaduan
    public function detail($id = null)
    {
        url_detail($id);
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Detail Pengaduan";
        $data['pengaduan'] = $this->master->get_pengaduan_id($id);
        $data['tanggapan'] = $this->master->get_tanggapan_id($id);
        $this->form_validation->set_rules('tanggapan', 'tanggapan', 'required|trim', ['required' => 'Tanggapan harap di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('pengaduan/detail');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_tanggapan($id, $data['pengguna']->id_admin);
        }
    }

    // Untuk Edit Status pengaduan
    public function edit_status($id)
    {
        $id_petugas = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row()->id_admin;
        return $this->master->edit_status($id, $id_petugas);
    }

    // Untuk menghapus data Pengaduan
    public function delete($id)
    {
        return $this->master->delete_pengaduan($id);
    }

    // Untuk menghapus tanggapan
    public function del_tanggapan($id, $url)
    {
        return $this->master->del_tanggapan($id, $url);
    }
}
