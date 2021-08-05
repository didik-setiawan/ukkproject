<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('M_user', 'user');
    }

    // Halaman Dashboard User
    public function index()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['pengaduan'] = $this->user->get_pengaduan_join_user($data['pengguna']->id_masyarakat);
        $data['title'] = "Aplikasi Pengaduan Masyarakat";
        $this->load->view('templates-user/header', $data);
        $this->load->view('user/index');
        $this->load->view('templates-user/footer');
    }

    // Halaman profil pengguna
    public function profile()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Profil Anda";
        $this->load->view('templates-user/header', $data);
        $this->load->view('user/profile');
        $this->load->view('templates-user/footer');
    }

    // Halaman Tambah pengaduan
    public function add_pengaduan()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Tambah Pengaduan";
        $data['kategori'] = $this->user->get_kategori();
        $this->form_validation->set_rules('isi', 'isi', 'required|trim', ['required' => 'Isi pengaduan tidak boleh kosong']);
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim', ['required' => 'Tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates-user/header', $data);
            $this->load->view('user/pengaduan/add');
            $this->load->view('templates-user/footer');
        } else {
            $this->user->add_pengaduan($data['pengguna']->id_masyarakat);
        }
    }

    // Halaman detail pengaduan
    public function detail_pengaduan($id = null)
    {
        url_detail_pengaduan($id);
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['pengaduan'] = $this->user->get_pengaduan_id($id, $data['pengguna']->id_masyarakat);
        $data['comment'] = $this->user->get_tanggapan($id);
        $data['title'] = "Detail Pengaduan";
        $this->load->view('templates-user/header', $data);
        $this->load->view('user/pengaduan/detail');
        $this->load->view('templates-user/footer');
    }

    // Halaman Pengaturan akun pengguna
    public function settings()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Pengaturan Akun";
        $this->load->view('templates-user/header', $data);
        $this->load->view('user/settings');
        $this->load->view('templates-user/footer');
    }

    // Halaman pengaturan nama pengguna
    public function setting_name()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Edit Nama";

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
            'required' => 'Nama wajib di isi',
            'min_length' => 'Nama min 3 huruf'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates-user/header', $data);
            $this->load->view('user/settings/nama');
            $this->load->view('templates-user/footer');
        } else {
            $this->user->setting_name();
        }
    }

    // Halaman pengaturan no Telp
    public function setting_phone()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Edit No Telp";

        $this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[9]|max_length[13]|numeric|is_unique[tb_masyarakat.telp]|is_unique[tb_admin.telp]', [
            'required' => 'No telp wajib di isi',
            'min_length' => 'No telp min 9 digit',
            'max_length' => 'No telp max 13 digit',
            'numeric' => 'No telp harus angka',
            'is_unique' => 'No telp sudah terdaftar, harap gunakan No telp lain'
        ]);
        $this->form_validation->set_rules('kode-negara', 'kode negara', 'required', ['required' => 'Kode negara harap di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates-user/header', $data);
            $this->load->view('user/settings/phone');
            $this->load->view('templates-user/footer');
        } else {
            $this->user->setting_phone();
        }
    }

    // Halaman Pengaturan Password
    public function setting_password()
    {
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Edit Password";

        $this->form_validation->set_rules('old_pass', 'old_pass', 'required|trim', ['required' => 'Password lama wajib di isi']);
        $this->form_validation->set_rules('new_pass', 'new_pass', 'required|trim|min_length[5]|matches[re_pass]', [
            'required' => 'Password baru wajib di isi',
            'min_length' => 'Password baru min 5 karakter',
            'matches' => 'Password baru harus sama dengan Ulangi password'
        ]);
        $this->form_validation->set_rules('re_pass', 're_pass', 'required|trim|matches[new_pass]', [
            'required' => 'Ulangi password wajib di isi',
            'matches' => 'Ulangi password harus sama dengan Password baru'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates-user/header', $data);
            $this->load->view('user/settings/password');
            $this->load->view('templates-user/footer');
        } else {
            $this->user->setting_password();
        }
    }


    public function notification()
    {
        $this->edit_status_notif();
        $data['pengguna'] = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Notifikasi";
        $data['notif'] = $this->user->get_notifikasi($data['pengguna']->id_masyarakat);
        $this->load->view('templates-user/header', $data);
        $this->load->view('user/notifikasi');
        $this->load->view('templates-user/footer');
    }

    public function edit_status_notif()
    {
        $id_masyarakat = $this->db->get_where('tb_masyarakat', ['username' => $this->session->userdata('username')])->row()->id_masyarakat;
        return $this->user->edit_status_notif($id_masyarakat);
    }
}
