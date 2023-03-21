<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('M_ren');
    }

    // setup
    public function index()
    {
        $check = $this->db->get('petugas')->num_rows();
        if (!$check) {
            $this->load->view('v_adminset');
        } else {
            $this->load->view('v_adminlog');
        }
    }
    // end setup

    // reg
    public function registeradmin()
    {
        $this->load->library('form_validation');
        $this->load->model('M_ren');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim|min_length[11]', [
            'min_length' => 'Number Tidak Ditemukan!',
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!',
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_adminset');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'telp' => $this->input->post('telp'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => 'admin',
            );
            $this->M_ren->simpan_register('petugas', $data);
            $this->session->set_flashdata('massagedone', '<div class="alert alert-success mt-3" role="alert"> Register Berhasil! </div>');
            redirect('c_admin');
        }
    }
    // end reg

    // login
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->M_ren->get_admin_data($username)->row_array();
        var_dump($user);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session_data = array(
                    'a_username' => $username,
                    'a_id' => $user['a_id'],
                    'a_usernamex' => $user['a_username'],
                );
                $this->session->set_userdata($session_data);

                if ($user['level'] == 'petugas') {
                    redirect('C_petugas');
                } else {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                    ];
                    redirect('c_admindash', $data);
                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger mt-3" role="alert"> Username Tidak Ada! </div>');
                redirect('c_admin');
            }
        } else {

            $this->session->set_flashdata('massage', '<div class="alert alert-danger mt-3" role="alert"> Password Salah! </div>');
            redirect('c_admin');
        }
    }
    // end login


    // logout
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Logout!</div>');
        redirect('c_admin');
    }
    // end logout
}
