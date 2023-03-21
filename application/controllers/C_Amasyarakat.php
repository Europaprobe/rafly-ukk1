<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Amasyarakat extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get('user')->result_array();
        $this->load->view('v_AdminMasyarakat', $data);
    }

    public function tambahmasyarakat()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $hasil = $this->db->get_where('user')->row_array();
        $insert = array(
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'level' => 3,
        
        );
        $this->db->insert('user', $insert);
        $this->session->set_flashdata('massage', '<div class="alert alert-success mt-3" role="alert"> Berhasil di tambahkan! </div>');
        redirect('c_Amasyarakat');
    }

    function edit_masyarakat($id)
    {
        $update = array(
            'nik' => $this->input->post('nik'),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'level' => 3,
        );
        $this->db->where('id', $id);
        $this->db->update('user', $update);
        redirect('c_Amasyarakat');
    }

    function delete_masyarakat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        redirect('c_Amasyarakat');
    }
}
