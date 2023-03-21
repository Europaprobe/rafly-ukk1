<?php
class M_ren extends CI_Model
{
    function simpan_register($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_user_data($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nik', $username);
        return $this->db->get();
    }
    public function get_admin_data($username)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('username', $username);
        return $this->db->get();
    }
    public function get_user_login($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nik', $username);
        return $this->db->get();
    }

    function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function insertSubKategori($data)
    {
        $this->db->insert('subkategori', $data);
    }

    function joinSubKategori()
    {
        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori', 'kategori.kategori_id = subkategori.kategori_id');
        return $this->db->get()->result_array();
    }

    public function laporan($add)
    {
        $this->db->insert('pengaduan', $add);
    }

    public function pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('user', 'user.nik=pengaduan.nik');
        return $this->db->get();
    }

    public function kategori()
    {
        return $this->db->get('kategori');
    }

    public function subketegori()
    {
        return $this->db->get('subkategori');
    }

    public function username($username)
    {
        return $this->db->get_where('user', ['username' => $username]);
    }

    public function riwayat_laporan()
    {
        $user = $this->M_ren->username($this->session->userdata('username'))->row_array();
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('user', 'user.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.kategori_id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.subkategori_id=pengaduan.sub');
        $this->db->where('user.nik', $user['nik']);
        return  $this->db->get();
    }

    public function listpengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('user', 'user.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.kategori_id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.subkategori_id=pengaduan.sub');
        return $this->db->get();
    }

    public function user()
    {
        return $this->db->get('user');
    }

    public function add_tanggapan($add)
    {
        $this->db->insert('tanggapan', $add);
    }

    public function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
        $this->db->where('tanggapan.id_pengaduan', $id);
        return $this->db->get();
    }

    public function status_pengaduan()
    {
        $user = $this->db->get_where('user',['username'=>$this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori','kategori.id=pengaduan.kategori');
        $this->db->join('subkategori','subkategori.subkategori_id=pengaduan.sub');
        $this->db->where('pengaduan.nik',$user['nik']);

        return $this->db->get();
    }
}
