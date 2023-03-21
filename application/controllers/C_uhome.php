<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_uhome extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_ren');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get('user')->result_array();
        $data['kategori'] = $this->M_ren->kategori()->result_array();
        $data['user'] = $this->M_ren->username($this->session->userdata('username'))->row_array();

        $this->load->view('u_home', $data);
    }


    public function laporan()
    {
        $this->load->model('M_ren');

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get('user')->result_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $waktu = $this->input->post('waktu');
        $isi_laporan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $sub_kategori = $this->input->post('subkategori_nama');


        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        $this->upload->do_upload('foto');
        $foto = $this->upload->data();
        $ss = $config['upload_path'] . $foto['file_name'];

        $add = array(
            'tgl' => date('y-m-d'),
            'waktu' => $waktu,
            'nik' => $user['nik'],
            'laporan' => $isi_laporan,
            'kategori' => $kategori,
            'sub' => $sub_kategori,
            'foto' => $ss,
        );
        $this->load->model('M_ren');
        $this->M_ren->laporan($add);
        $this->M_ren->pengaduan()->result_array();
        redirect('c_uaduan');
    }

    public function get_sub_kategori($id_kategori)
    {
        // $id_kategori = $this->input->post(id);
        $sub_kategori = $this->db->get_where('subkategori', ['kategori_id' => $id_kategori])->result();
        $data = "<option value=''>-- Pilih --</option>";
        foreach ($sub_kategori as $value) {
            $data .= "<option value='" . $value->subkategori_id . "'>" . $value->subkategori_nama . "</option>";
        }
        echo $data;
        // echo json_encode($sub_kategori);
    }
}
