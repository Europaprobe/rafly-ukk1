<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Apetugas extends CI_Controller
{
    public function index()
    {
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();
        $this->load->view('v_AdminPetugas', $data);
    }

    public function tambahpetugas()
    {
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $hasil = $this->db->get_where('petugas')->row_array();
        $insert = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'level' => $this->input->post('level'),
        );
        $this->db->insert('petugas', $insert);
        $this->session->set_flashdata('massage', '<div class="alert alert-success mt-3" role="alert"> Berhasil di tambahkan! </div>');
        redirect('c_Apetugas');
    }

    function edit_petugas($id)
    {
        $update = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'telp' => $this->input->post('telp'),
            'level' => $this->input->post('level'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $update);
        redirect('c_Apetugas');
    }

    function delete_petugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
        redirect('c_Apetugas');
    }
}
