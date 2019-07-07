<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class admin extends CI_Controller {
// aji elek
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
        
        redirect(base_url('admin/dashboard'));
    }
    
    public function dashboard()
	{
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url('login'));
        // }
        // mengambil data2 dari table admin
        $data_admin     = $this->m_data->tampil_data('admin')->result();
    
        // di parsing ke view
        $data = array(
            'admin'      => $data_admin,
        );

        // menampilkan view index
		$this->load->view('dashboard',$data);
    }

    public function admin_guru()
	{
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url('login'));
        // }
        // mengambil data2 dari table admin
        $data_admin_guru    = $this->m_data->tampil_data('guru')->result();
    
        // di parsing ke view
        $data = array(
            'guru'      => $data_admin_guru,
        );

        // menampilkan view index
		$this->load->view('admin_guru',$data);
    }

    public function ubah_guru()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        
        $guru      = mysqli_real_escape_string($db, $this->input->post('guru'));
        $username  = mysqli_real_escape_string($db, $this->input->post('username'));
        $password  = mysqli_real_escape_string($db, $this->input->post('password'));
                
        $where = array('id_guru' => 1 );
        
        $data = array(
            'guru'        => $guru,
            'username'    => $username,
            'password'    => MD5($password)           
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'guru');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/admin_guru'));
    }

    public function admin_siswa()
	{
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url('login'));
        // }
        // mengambil data2 dari table admin
        $data_admin_siswa    = $this->m_data->tampil_data('siswa')->result();
    
        // di parsing ke view
        $data = array(
            'siswa'      => $data_admin_siswa,
        );

        // menampilkan view index
		$this->load->view('admin_siswa',$data);
    }

    public function tambah_siswa()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $nama          = mysqli_real_escape_string($db, $this->input->post('nama'));
        $username      = mysqli_real_escape_string($db, $this->input->post('username'));
        $password      = mysqli_real_escape_string($db, $this->input->post('password'));
        $data = array(
            'nama'        => $nama,
            'username'    => $username,
            'password'    => MD5($password),
        );

        // ===== input data ke tabel =====             
        $this->m_data->input_data($data,'siswa');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/admin_siswa'));
    }

    public function ubah_siswa()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id        = mysqli_real_escape_string($db, $this->input->post('id'));
        $nama      = mysqli_real_escape_string($db, $this->input->post('nama'));
        $username  = mysqli_real_escape_string($db, $this->input->post('username'));
        $password  = mysqli_real_escape_string($db, $this->input->post('password'));
                
        $where = array('id_siswa' => $id );
        
        $data = array(
            'nama'        => $nama,
            'username'    => $username,
            'password'    => MD5($password)           
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'siswa');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/admin_siswa'));
    }

    public function hapus_siswa($kode)
    {
        $where = array('id_siswa' => $kode);

        $this->m_data->hapus_data($where,'siswa');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/admin_siswa'));
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
        redirect(base_url('admin'));
    }

    public function hapus($kode)
    {
        $where = array('id_admin' => $kode);

        $this->m_data->hapus_data($where,'admin');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin'));
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
        
        $where = array('id_admin' => 1 );
        
        $data = array(
            'username'      => $username,
            'password'      => md5($password),
            'email'         => $email,
            'tanggaljam'    => $date
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'admin');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin'));
    }
}
