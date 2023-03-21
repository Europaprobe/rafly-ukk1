<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_akate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ren');
    }

    public function index()
    {
        $data['kategori'] = $this->db->get_where('kategori')->result_array();
        $data['subkategori'] = $this->db->get_where('subkategori')->result_array();
        $data['joinSubKategori'] = $this->M_ren->joinSubKategori();
        $this->load->view('v_AdminKategori', $data);
    }

    public function tambahkat()
    {
        $this->load->model('M_ren');

        $kategori = $this->input->post('kategori_nama');

        $tambahKategori = array(
            'kategori_nama' => $kategori,
        );

        $this->M_ren->insertKategori($tambahKategori);
        redirect('c_akate');
    }

    function delete_kat($id)
    {
        $this->db->where('kategori_id', $id);
        $this->db->delete('kategori');
        redirect('c_akate');
    }


    public function tambahsubkat()
    {
        $this->load->model('M_ren');

        $kategori = $this->input->post('kategori');
        $subkategori = $this->input->post('subkategori_nama');

        $data = array(
            'kategori_id' => $kategori,
            'subkategori_nama' => $subkategori,
        );

        $this->M_ren->joinSubKategori();
        $this->M_ren->insertSubKategori($data);
        redirect('c_akate');
    }

    function delete_subkat($id)
    {
        $this->db->where('subkategori_id', $id);
        $this->db->delete('subkategori');
        redirect('c_akate');
    }

    // public function get_sub_kategori()
    // {
    //     $kategori_id = $this->input->post('ketegori_id');
    //     $sub_kategori = $this->db->get_where('subkategori', ['kategori_id' => $kategori_id])->result();
    //     echo json_encode($sub_kategori);
    // }


    function get_sub_kategori($kategori_id)
    {
        $sub_kategori = $this->db->get_where('subkategori', ['kategori_id' => $kategori_id])->result();
        $data = "<option value=''>- Pilih -</option>";
        foreach ($sub_kategori as $value) {
            $data .= "<option value='" . $value->subkategori_id . "'>" . $value->subkategori_nama . "</option>";
        }
        echo $data;
    }
}
