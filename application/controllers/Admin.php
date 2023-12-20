<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        function cek_login()
    {
        $CI = &get_instance();

        if (!$CI->session->userdata('email')) {
            $CI->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses Ditolak. Anda belum login!</div>');
            redirect('autentifikasi');
        } else {
            $role_id = $CI->session->userdata('role_id');
        }
    }
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function cek_login()
    {
        $CI = &get_instance();

        if (!$CI->session->userdata('email')) {
            $CI->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses Ditolak. Anda belum login!</div>');
            redirect('autentifikasi');
        } else {
            $role_id = $CI->session->userdata('role_id');
        }
    }
    
}
