<?php
function cek_admin()
{
    $c = get_instance();
    if ($c->session->userdata('nik')) {
        redirect('user');
    } elseif (!$c->session->userdata('level')) {
        redirect('auth');
    }
}

function cek_admin_utama()
{
    $c = get_instance();
    $level_admin = $c->db->get_where('tb_admin', ['username' => $c->session->userdata('username')])->row()->level;

    if ($level_admin != 1) {
        redirect('admin');
    } elseif ($c->session->userdata('nik')) {
        redirect('user');
    } elseif (!$c->session->userdata('level')) {
        redirect('auth');
    }
}

function cek_user()
{
    $c = get_instance();
    if ($c->session->userdata('level')) {
        redirect('admin');
    } elseif (!$c->session->userdata('nik')) {
        redirect('auth');
    }
}

function url_detail_pengaduan($id)
{
    $c = get_instance();
    $pengaduan = $c->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row();

    if ($id == null) {
        redirect('user');
    } elseif (md5($pengaduan->id_pengaduan) != $id) {
        redirect('user');
    }
}


function url_detail($id)
{
    $c = get_instance();
    $pengaduan = $c->db->get_where('tb_pengaduan', ['md5(id_pengaduan)' => $id])->row();

    if ($id == null) {
        redirect('pengaduan');
    } elseif (md5($pengaduan->id_pengaduan) != $id) {
        redirect('pengaduan');
    }
}


function for_auth()
{
    $c = get_instance();
    if ($c->session->userdata('level')) {
        redirect('admin');
    } elseif ($c->session->userdata('nik')) {
        redirect('user');
    }
}
