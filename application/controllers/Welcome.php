<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class Welcome extends CI_Controller {
// jjjjjjjjjjjjjjjjjjjjjj
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
        // mengambil data2 dari table admin
        $data_admin = $this->m_data->tampil_data('admin')->result();
        $data_profil = $this->m_data->tampil_data('profil')->result();

        // di parsing ke view
        $data = array(
            'admin' => $data_admin, 
            'profil' => $data_profil, 
        );

        // menampilkan view index
		$this->load->view('index',$data);
    }

    public function siswa()
	{
        // mengambil data2 dari table admin
        $data_admin = $this->m_data->tampil_data('admin')->result();
        $data_profil = $this->m_data->tampil_data('profil')->result();

        // di parsing ke view
        $data = array(
            'admin' => $data_admin, 
            'profil' => $data_profil, 
        );

        // menampilkan view index
		$this->load->view('siswa',$data);
    }
    
    public function dashboard()
	{
        // mengambil data2 dari table admin
        $data_admin = $this->m_data->tampil_data('admin')->result();

        // di parsing ke view
        $data = array(
            'admin' => $data_admin, 
        );

        // menampilkan view index
		$this->load->view('dashboard',$data);
    }
    
    public function profil()
	{
        // mengambil data2 dari table admin
        $data_profil = $this->m_data->tampil_data('profil')->result();

        // di parsing ke view
        $data = array(
            'profil' => $data_profil, 
        );

        // menampilkan view index
		$this->load->view('profil',$data);
    }
    
    public function ubah_profil()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $profil      = mysqli_real_escape_string($db, $this->input->post('profil'));
        $visi        = mysqli_real_escape_string($db, $this->input->post('visi'));
        $misi        = mysqli_real_escape_string($db, $this->input->post('misi'));
        $misi = str_ireplace(array("\r","\n",'\r','\n'),'', $misi);
                
        $where = array('id_profil' => 1 );
        
        $data = array(
            'profil'   => $profil,
            'visi'     => $visi,
            'misi'     => $misi            
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'profil');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/profil'));
    }

    public function angket()
	{
        // mengambil data2 dari table admin
        $data_angket = $this->m_data->tampil_data('angket')->result();

        // di parsing ke view
        $data = array(
            'angket' => $data_angket, 
        );

        // menampilkan view index
		$this->load->view('angket',$data);
    }

    public function tambah_angket()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $soal      = mysqli_real_escape_string($db, $this->input->post('soal'));
        $bidang      = mysqli_real_escape_string($db, $this->input->post('bidang'));
        $data = array(
            'soal'    => $soal,
            'bidang'    => $bidang
        );

        // ===== input data ke tabel =====             
        $this->m_data->input_data($data,'angket');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/angket'));
    }

    public function ubah_angket()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id        = mysqli_real_escape_string($db, $this->input->post('id'));
        $soal      = mysqli_real_escape_string($db, $this->input->post('soal'));
        $bidang        = mysqli_real_escape_string($db, $this->input->post('bidang'));
                
        $where = array('id_angket' => $id );
        
        $data = array(
            'soal'      => $soal,
            'bidang'    => $bidang           
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'angket');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/angket'));
    }

    public function hapus_angket($kode)
    {
        $where = array('id_angket' => $kode);

        $this->m_data->hapus_data($where,'angket');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/angket'));
    }

    public function bidang()
	{
        // mengambil data2 dari table admin
        $data_bidang = $this->m_data->tampil_data('bidang')->result();

        // di parsing ke view
        $data = array(
            'bidang' => $data_bidang, 
        );

        // menampilkan view index
		$this->load->view('bidang',$data);
    }

    public function tambah()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $username   = mysqli_real_escape_string($db, $this->input->post('username'));
        $password   = mysqli_real_escape_string($db, $this->input->post('password'));
        $email      = mysqli_real_escape_string($db, $this->input->post('email'));
        $data = array(
            'username'      => $username,
            'password'      => $password,
            'email'         => $email,
            'tanggaljam'    => $date
        );

        // ===== input data ke tabel =====             
        $this->m_data->input_data($data,'admin');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome'));
    }

    public function hapus($kode)
    {
        $where = array('id_admin' => $kode);

        $this->m_data->hapus_data($where,'admin');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome'));
    }

    public function edit($kode)
    {
        $where = array('id_admin' => $kode);
        $data_admin = $this->m_data->select_where($where,'admin')->result();

        // di parsing ke view
        $data = array(
            'admin'         => $data_admin, 
            'kode_admin'    => $kode, 
        );

        // menampilkan view index
        $this->load->view('edit',$data);
    }

    public function proses_edit()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $username   = mysqli_real_escape_string($db, $this->input->post('username'));
        $password   = mysqli_real_escape_string($db, $this->input->post('password'));
        $email      = mysqli_real_escape_string($db, $this->input->post('email'));
        
        $where = array('id_admin' => $id );
        
        $data = array(
            'username'      => $username,
            'password'      => $password,
            'email'         => $email,
            'tanggaljam'    => $date
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'admin');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome'));
    }
}
