<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_admin_utama();
        $this->load->model('M_master', 'master');
    }

    // Halaman Management Data Petugas
    public function petugas()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Management Data Petugas";
        $data['petugas'] = $this->master->get_All_Petugas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/petugas/index');
        $this->load->view('templates/footer');
    }

    // Halaman Tambah Data Admin / Petugas
    public function add_petugas()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Tambah Data Petugas";
        $data['kategori'] = $this->master->get_kategori();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
            'required' => 'Nama tidak boleh kosong',
            'min_length' => 'Nama min 3 karakter'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]|is_unique[tb_admin.username]|is_unique[tb_masyarakat.username]|alpha_dash', [
            'required' => 'Username tidak boleh kosong',
            'min_length' => 'Username min 5 karakter',
            'is_unique' => 'Username sudah terdaftar, harap gunakan Username lain',
            'alpha_dash' => 'Username hanya boleh huruf, angka, underscore atau tanda hubung'
        ]);
        $this->form_validation->set_rules('telp', 'no telp', 'required|trim|min_length[10]|max_length[13]|is_unique[tb_admin.telp]|is_unique[tb_masyarakat.telp]|numeric', [
            'required' => 'No telp tidak boleh kosong',
            'min_length' => 'No telp min 10 digit',
            'max_length' => 'No telp max 13 digit',
            'is_unique' => 'No telp sudah terdaftar, harap gunakan no telp lain',
            'numeric' => 'No telp harus angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|matches[repassword]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password min 3 karakter',
            'matches' => 'Password harus sama dengan Ulangi Password'
        ]);
        $this->form_validation->set_rules('repassword', 'ulangi password', 'required|trim|matches[password]', [
            'required' => 'Ulangi Password tidak boleh kosong',
            'matches' => 'Ulangi Password harus sama dengan Password'
        ]);

        if ($this->input->post('level') == 2) {
            $this->form_validation->set_rules('kategori', 'kategori', 'required', ['required' => 'Kategori harap di isi']);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('master/petugas/add');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_petugas();
        }
    }

    // Untuk menghapus data petugas
    public function del_petugas($id)
    {
        return $this->master->del_petugas($id);
    }


    // Halaman Management Data Masyarakat
    public function masyarakat()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Management Data Masyarakat";
        $data['masyarakat'] = $this->master->get_All_Masyarakat();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/masyarakat/index');
        $this->load->view('templates/footer');
    }

    // Untuk mengambil data masyarakat berdasarkan ID
    public function get_masyarakat_id()
    {
        $id = $_POST['id'];
        echo json_encode($this->master->get_masyarakat_id($id));
    }

    // Untuk menghapus data masyarakat
    public function del_masyarakat($id)
    {
        return $this->master->del_masyarakat($id);
    }

    // Untuk menonaktifkan akun masyarakat
    public function nonaktif_masyarakat($id)
    {
        return $this->master->nonaktif_masyarakat($id);
    }

    // Untuk mengaktifkan akun masyarakat
    public function aktif_masyarakat($id)
    {
        return $this->master->aktif_masyarakat($id);
    }

    // Untuk generate laporan ke PDF
    private function gen_pdf($html)
    {
        require FCPATH . 'asset/mpdf/vendor/autoload.php';
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        $pdf->Output();
    }

    // Generate Laporan masyarakat
    public function pdf_masyarakat()
    {
        $data['masyarakat'] = $this->master->get_All_Masyarakat();
        $html = $this->load->view('master/generate/masyarakat', $data, true);
        $filename = "laporan masyarakat.pdf";
        return $this->gen_pdf($html);
    }

    // generate Laporan petugas
    public function pdf_petugas()
    {
        $data['petugas'] = $this->master->get_All_Petugas();
        $html = $this->load->view('master/generate/petugas', $data, true);
        return $this->gen_pdf($html);
    }

    // Generate laporan pengaduan
    public function pdf_pengaduan()
    {
        $data['pengaduan'] = $this->master->get_pengaduan_join_masyarakat();
        $html = $this->load->view('master/generate/pengaduan', $data, true);
        return $this->gen_pdf($html);
    }


    public function kategori()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['kategori'] = $this->master->get_kategori();
        $data['title'] = "Management Data Kategori";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/kategori/index');
        $this->load->view('templates/footer');
    }

    public function add_kategori()
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['title'] = "Tambah Data Kategori";

        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim|min_length[5]|alpha_numeric_spaces|is_unique[tbl_kategori.nama_kategori]', [
            'required' => 'kategori wajib di isi',
            'min_length' => 'kategori min 5 huruf',
            'alpha_numeric_spaces' => 'Kategori hanya boleh huruf angka dan spasi',
            'is_unique' => 'Kategori sudah terdaftar'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('master/kategori/add');
            $this->load->view('templates/footer');
        } else {
            $this->master->add_kategori();
        }
    }

    public function edit_kategori($id)
    {
        $data['pengguna'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row();
        $data['kategori'] = $this->master->get_kategori_id($id);
        $data['title'] = "Edit Data Kategori";

        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim|min_length[5]|alpha_numeric_spaces|is_unique[tbl_kategori.nama_kategori]', [
            'required' => 'kategori wajib di isi',
            'min_length' => 'kategori min 5 huruf',
            'alpha_numeric_spaces' => 'Kategori hanya boleh huruf angka dan spasi',
            'is_unique' => 'Kategori sudah terdaftar'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('master/kategori/edit');
            $this->load->view('templates/footer');
        } else {
            $this->master->edit_kategori($id);
        }
    }

    public function del_kategori($id)
    {
        return $this->master->del_kategori($id);
    }
}
