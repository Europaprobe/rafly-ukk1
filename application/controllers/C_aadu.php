<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_aadu extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_ren');
        $data['aduan'] = $this->M_ren->listpengaduan()->result_array();

        $this->load->view('v_adminadu',$data);
    }

    public function laporan_up($id)
	{
		$data = $this->M_ren->username($this->session->userdata('username'))->row_array();
		$data = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$tanggapan = $this->input->post('tanggapan');
		$status = $this->input->post('status');
		

		$add = [
			'id_pengaduan' => $id,
			'tanggapan' => $tanggapan,
			'tanggal' =>  date('Y-m-d'),
			'id_petugas' => $data['id'],
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
		redirect('C_View/listlapor');
	}
}
