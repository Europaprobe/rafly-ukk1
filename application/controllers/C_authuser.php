<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_authuser extends CI_Controller
{
    // login
    public function index()
    {
        $this->load->library('form_validation');
        $this->load->model('M_ren');

        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('u_login');
        } else {
            $username = $this->input->post('nik');
            $password = $this->input->post('password');
            $user = $this->M_ren->get_user_data($username)->row_array();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $session_data = array('nik' => $username, 'id' => $user['id'], 'username' => $user['username']);
                    $this->session->set_userdata($session_data);

                    if ($user['level'] == 2) {
                        redirect('c_ren_op');
                    } else {
                        $data = [
                            'nik' => $user['nik'],
                            'level' => $user['level'],
                        ];
                        redirect('c_uhome', $data);
                    }
                } else {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger mt-3" role="alert"> Mohon verifikasi! </div>');
                    redirect('c_authuser');
                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger mt-3" role="alert"> Mohon verifikasi! </div>');
                redirect('c_authuser');
            }
        }
    }
    // end login


    // reg

    public function reg()
    {
        $this->load->library('form_validation');
        $this->load->model('M_ren');

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[12]', [
            'min_length' => 'NIK Tidak Terdaftar!',
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim|min_length[11]', [
            'min_length' => 'Number Tidak Ditemukan!',
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!',
            'required' => 'Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('u_reg');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'telp' => $this->input->post('telp'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => 3,
            );
            $this->M_ren->simpan_register('user', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success mt-3" role="alert"> Register Berhasil! </div>');
            redirect('c_authuser');
        }
    }

    // end reg


    // login google

    function google_login()
    {
        include_once APPPATH . "../vendor/autoload.php";

        $this->load->model('google_login_model');

        $google_client = new Google_Client();

        $google_client->setClientId('45620671459-q8kcnvdlhl45q0p5buadbp0jdmtjfrl3.apps.googleusercontent.com'); //Define your ClientID

        $google_client->setClientSecret('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'); //Define your Client Secret Key

        $google_client->setRedirectUri('http://localhost/Cepuya/c_ren_login'); //Define your Redirect Uri

        $google_client->addScope('email');

        $google_client->addScope('profile');

        if (isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            if (!isset($token["error"])) {
                $google_client->setAccessToken($token['access_token']);

                $this->session->set_userdata('access_token', $token['access_token']);

                $google_service = new Google_Service_Oauth2($google_client);

                $data = $google_service->userinfo->get();

                $current_datetime = date('Y-m-d H:i:s');

                if ($this->google_login_model->Is_already_register($data['id'])) {
                    //update data
                    $user_data = array(
                        'name' => $data['given_name'],
                        'email' => $data['email'],
                    );
                    $session_data = array(
                        'email' => $user_data['email']
                    );
                    $this->session->set_userdata($session_data);
                    $this->google_login_model->Update_user_data($user_data, $data['id']);
                } else {
                    //insert data
                    $user_data = array(
                        'google_id' => $data['id'],
                        'name'  => $data['given_name'],
                        'email'  => $data['email'],
                    );

                    $session_data = array(
                        'email' => $user_data['email']
                    );
                    $this->session->set_userdata($session_data);

                    $this->google_login_model->Insert_user_data($user_data);
                }
                $this->session->set_userdata('user_data', $user_data);
            }
        }
        $login_button = '';
        if (!$this->session->userdata('access_token')) {
            $login_button = '<a href="' . $google_client->createAuthUrl() . '">Google With Login</a>';
            $data['login_button'] = $login_button;
            $this->load->view('v_ren_login', $data);
        } else {
            redirect('c_ren_home');
        }
    }

    // end login google


    // logout
    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berhasil Logout!</div>');
        redirect('c_authuser');
    }
    // end logout

    // logout google
    function google_logout()
    {
        $this->session->unset_userdata('access_token');

        $this->session->unset_userdata('user_data');

        redirect('c_authuser');
    }
    // end logout google
}
