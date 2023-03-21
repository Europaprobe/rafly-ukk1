<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ren');
    }

    public function index()
    {
        $this->load->view('p_dashboard');
    }

    // kategori
    public function kategori()
    {
        $data['kategori'] = $this->db->get_where('kategori')->result_array();
        $data['subkategori'] = $this->db->get_where('subkategori')->result_array();
        $data['joinSubKategori'] = $this->M_ren->joinSubKategori();
        $this->load->view('p_kategori', $data);
    }

    public function tambahkat()
    {
        $this->load->model('M_ren');

        $kategori = $this->input->post('kategori_nama');

        $tambahKategori = array(
            'kategori_nama' => $kategori,
        );

        $this->M_ren->insertKategori($tambahKategori);
        redirect('C_petugas/kategori');
    }

    function delete_kat($id)
    {
        $this->db->where('kategori_id', $id);
        $this->db->delete('kategori');
        redirect('C_petugas/kategori');
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
        redirect('C_petugas/kategori');
    }

    function delete_subkat($id)
    {
        $this->db->where('subkategori_id', $id);
        $this->db->delete('subkategori');
        redirect('C_petugas/kategori');
    }

    function get_sub_kategori($kategori_id)
    {
        $sub_kategori = $this->db->get_where('subkategori', ['kategori_id' => $kategori_id])->result();
        $data = "<option value=''>- Pilih -</option>";
        foreach ($sub_kategori as $value) {
            $data .= "<option value='" . $value->subkategori_id . "'>" . $value->subkategori_nama . "</option>";
        }
        echo $data;
    }
    // end kategori


    // laporan
    public function Laporan()
    {
        $this->load->model('M_ren');
        $data['aduan'] = $this->M_ren->listpengaduan()->result_array();
        $sa = $this->db->get_where('petugas', ['username' => $this->session->userdata('a_username')])->row_array();
        $this->load->view('p_laporan', $data);
    }

    public function laporan_up($id)
    {
        // $data = $this->M_ren->username($this->session->userdata('username'))->row_array();
        $data = $this->db->get_where('petugas', ['username' => $this->session->userdata('a_username')])->row_array();

        $status = $this->input->post('status');
        $tanggapan = $this->input->post('tanggapan');
        $desa = $data['id_petugas'];


        $add = [
            'id_pengaduan' => $id,
            'tanggapan' => $tanggapan,
            'tanggal' =>  date('Y-m-d'),
            'id_petugas' => $desa,
        ];

        $this->M_ren->add_tanggapan($add);
        $this->M_ren->tanggapan($id);
        $this->M_ren->listpengaduan()->result_array();

        $update = [
            'status' => $status
        ];

        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $update);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil mengirim tanggapan !
			  </div>');
        redirect('C_petugas/laporan');
    }
    // laporan

    // pdf
    public function laporan_pdf()
    {
        $this->load->model('M_ren');
        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            ),
            'pengadu' => $this->M_ren->listpengaduan()->result_array(),

        );

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }
    // end pdf
}
