<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_uaduan extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_ren');
        $data['user'] = $this->M_ren->username($this->session->userdata('username'))->result_array();
        $data['xx'] = $this->M_ren->listpengaduan()->result_array();
        $data['masyarakat'] = $this->M_ren->user()->result_array();
        $data['xx'] = $this->M_ren->riwayat_laporan()->result_array();

        $this->load->view('u_aduan', $data);
    }
}
