<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_admin();
        $this->load->model('M_admin', 'admin');
    }

    // Halaman Dashboard Admin & Petugas
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Dashboard Admin";
        if ($this->session->userdata('kategori') == 0) {
            $data['pengaduan'] = $this->admin->get_pengaduan_limit();
        } else {
            $data['pengaduan'] = $this->admin->get_pengaduan_limit_by_kategori();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    // Untuk Melihat Profil Admin & Petugas
    public function profile()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Profil Admin";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/profile');
        $this->load->view('templates/footer');
    }

    // Halaman Pengaturan Akun
    public function settings()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Pengaturan Akun";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/settings');
        $this->load->view('templates/footer');
    }

    // Halaman Pengaturan Nama
    public function setting_name()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Pengaturan Akun";

        $this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', ['required' => 'Nama wajib di isi', 'min_length' => 'Nama min 3 karakter']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/settings/nama');
            $this->load->view('templates/footer');
        } else {
            $this->admin->setting_name();
        }
    }

    // Halaman Pengaturan No telp
    public function setting_phone()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Pengaturan Akun";

        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|min_length[10]|max_length[13]|numeric|is_unique[tb_admin.telp]|is_unique[tb_masyarakat.telp]', [
            'required' => 'No Telp wajib di isi',
            'numeric' => 'No Telp harus angka',
            'min_length' => 'No Telp min 10 digit',
            'max_length' => 'No Telp max 13 digit',
            'is_unique' => 'No Telp sudah terdaftar, harap gunakan no telp lain'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/settings/phone');
            $this->load->view('templates/footer');
        } else {
            $this->admin->setting_phone();
        }
    }

    // Halaman Pengaturan Password
    public function setting_password()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Edit Password";

        $this->form_validation->set_rules('old_pass', 'old_pass', 'required|trim', ['required' => 'Password lama wajib di isi']);
        $this->form_validation->set_rules('new_pass', 'new_pass', 'required|trim|min_length[5]|matches[re_pass]', [
            'required' => 'Password baru wajib di isi',
            'min_length' => 'Password baru min 5 karakter',
            'matches' => 'Password baru harus sama dengan ulangi password'
        ]);
        $this->form_validation->set_rules('re_pass', 're_pass', 'required|trim|matches[new_pass]', [
            'required' => 'Ulangi password wajib di isi',
            'matches' => 'Ulangi password harus sama dengan Password baru'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/settings/password');
            $this->load->view('templates/footer');
        } else {
            $this->admin->setting_password();
        }
    }
}
