<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth', 'auth');
    }

    // Halaman login
    public function index()
    {
        for_auth();
        $this->form_validation->set_rules('username', 'username', 'required|trim', ['required' => 'Username tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'password', 'required|trim', ['required' => 'Password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->pv_login();
        }
    }

    // Proses login
    private function pv_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5(htmlspecialchars($this->input->post('password')));
        $admin = $this->db->get_where('tb_admin', ['username' => $username])->row();
        $user = $this->db->get_where('tb_masyarakat', ['username' => $username])->row();

        if ($admin) {
            if ($admin->password == $password) {
                $data = [
                    'username' => $username,
                    'level' => $admin->level,
                    'kategori' => $admin->id_kategori
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('gagal', 'Password salah, coba cek kembali');
                redirect('auth');
            }
        } elseif ($user) {
            if ($user->password == $password) {
                if ($user->aktif == 1) {
                    $data = [
                        'username' => $username,
                        'nik' => $user->nik
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('gagal', 'Akun anda sudah tidak aktif');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Password salah, coba cek kembali');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Akun tidak ditemukan, coba cek kembali');
            redirect('auth');
        }
    }


    // Halaman Registrasi Akun baru
    public function register()
    {
        for_auth();
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|exact_length[16]|is_unique[tb_masyarakat.nik]', [
            'required' => 'NIK tidak boleh kosong',
            'numeric' => 'NIK harus angka',
            'exact_length' => 'NIK harus 16 digit',
            'is_unique' => 'NIK sudah terdaftar'
        ]);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
            'required' => 'Nama tidak boleh kosong',
            'min_length' => 'Nama min 3 huruf'
        ]);

        $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[5]|is_unique[tb_masyarakat.username]|is_unique[tb_admin.username]|alpha_dash', [
            'required' => 'Username tidak boleh kosong',
            'min_length' => 'Username min 5 karakter',
            'is_unique' => 'Username sudah terdaftar, harap gunakan username lain',
            'alpha_dash' => 'Username tidak boleh ada spasi'
        ]);

        $this->form_validation->set_rules('kode-negara', 'Kode negara', 'required', ['required' => 'Kode negara harap di isi']);

        $this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[9]|max_length[13]|is_unique[tb_masyarakat.username]|is_unique[tb_admin.username]|numeric', [
            'required' => 'No telp tidak boleh kosong',
            'min_length' => 'No telp min 8 angka',
            'is_unique' => 'No telp sudah terdaftar, harap gunakan No telp lain',
            'max_length' => 'No telp max 13 angka',
            'numeric' => 'No telp harus angka'
        ]);

        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|matches[repassword]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password min 5 karakter',
            'matches' => 'Password harus sama dengan Ulangi Password'
        ]);

        $this->form_validation->set_rules('repassword', 'ulangi password', 'required|trim|matches[password]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'matches' => 'Ulangi password harus sama dengan Password'
        ]);
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha', [
            'required' => 'Recaptcha harap di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->pv_register();
        }
    }


    public function validate_captcha()
    {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcJ96caAAAAAFYZISzfAouI_CTrPVJOnsbcu-OG&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Proses Registrasi
    private function pv_register()
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => md5(htmlspecialchars($this->input->post('password'))),
            'kode_negara' => htmlspecialchars($this->input->post('kode-negara')),
            'telp' => htmlspecialchars($this->input->post('telp')),
            'tgl_bergabung' => time(),
            'aktif' => 1
        ];

        if ($this->db->insert('tb_masyarakat', $data)) {
            $this->session->set_flashdata('berhasil', 'Akun baru berhasil di buat, Silahkan login');
            redirect('auth');
        } else {
            $this->session->set_flashdata('gagal', 'Akun baru gagal di buat, Harap coba kembali');
            redirect('auth');
        }
    }

    // Proses logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function lost_password()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username harap di isi']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', ['required' => 'Email harap di isi', 'valid_email' => 'Format email tidak valid']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/lost_password');
        } else {
            $username = $this->input->post('username');
            $user = $this->db->get_where('tb_masyarakat', ['username' => $username, 'aktif' => 1])->row();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $email = $this->input->post('email');
                $this->auth->add_to_token($token, $email, $username);
                $this->pv_send_Email($token, $email);
            } else {
                $this->session->set_flashdata('gagal', 'Username tidak terdaftar atau akun sudah tidak aktif');
                redirect('auth/lost_password');
            }
        }
    }

    public function pv_send_Email($token, $email)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'setyafordevelopment@gmail.com',
            'smtp_pass' => 'umbulsari',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'wordwrap' => TRUE
        ];
        // $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('pengaduanapp@gmail.com', 'Aplikasi pengaduan masyarakat');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset Password');
        $this->email->message('Klik link berikut untuk mereset password akun anda : <a href="http://localhost' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>');
        if ($this->email->send()) {
            $this->session->set_flashdata('berhasil', 'Link reset password berhasil di kirim. coba lihat email anda');
            redirect('auth');
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('tbl_token', ['email' => $email, 'token' => $token])->row();

        if ($user) {
            $this->session->set_userdata('reset_password', $user->username);
            $this->change_password();
        } else {
            $this->session->set_flashdata('gagal', 'Reset password gagal, kesalahan email / token');
            redirect('auth');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_password')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('new_password', 'password baru', 'trim|required|min_length[5]|matches[repassword]', [
            'required' => 'Password baru harap di isi',
            'min_length' => 'Password baru min 5 karakter',
            'matches' => 'Password baru harus sama dengan Ulangi password'
        ]);
        $this->form_validation->set_rules('repassword', 'ulangi password', 'trim|required|matches[new_password]', [
            'required' => 'Ulangi password harap di isi',
            'matches' => 'Ulangi password harus sama dengan Password baru'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/change_password');
        } else {
            $this->auth->reset_password();
        }
    }
}
