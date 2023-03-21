<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_uset extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_ren');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['user'] = $this->M_ren->username($this->session->userdata('username'))->row_array();

        $this->load->view('u_uset', $data);
    }


    function edit_data($id)
    {
        $update = array(
            'name' => $this->input->post('name1'),
            'nik' => $this->input->post('nik1'),
            'username' => $this->input->post('username1'),
            'telp' => $this->input->post('telp1'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        );
        $this->db->where('id', $id);
        $this->db->update('user', $update);
        $this->session->set_flashdata('massage', '<div class="alert alert-success mt-3" role="alert"> Success! </div>');
        redirect('C_uset');
    }
}
