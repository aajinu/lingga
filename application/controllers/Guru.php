<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class Guru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
    }

    public function index()
	{
        if ($this->session->userdata('status') != "loginguru"){
            redirect(base_url('siswa'));
        } else {
            // mengambil data2 dari table admin
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();

            // di parsing ke view
            $data = array(
                'admin' => $data_admin, 
                'profil' => $data_profil, 
            );

            $this->load->view('guru/header',$data);
            $this->load->view('guru/index',$data);
            $this->load->view('guru/footer',$data);
        }
    }

    public function rpl_klasikal()
	{
        if ($this->session->userdata('status') != "loginguru"){
            redirect(base_url('siswa'));
        } else {
            // mengambil data2 dari table admin
            $admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $klasikal = $this->m_data->select_where(array('id_rpl' => "1"),'rpl')->row();

            // di parsing ke view
            $data = array(
                'admin' => $admin, 
                'profil' => $data_profil, 
                'klasikal' => $klasikal, 

            );

            $this->load->view('guru/header',$data);
            $this->load->view('guru/rpl_klasikal',$data);
            $this->load->view('guru/footer',$data);
        }
    }

    public function rpl_kelompok()
	{
        if ($this->session->userdata('status') != "loginguru"){
            redirect(base_url('siswa'));
        } else {
            // mengambil data2 dari table admin
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $klasikal = $this->m_data->select_where(array('id_rpl' => "2"),'rpl')->row();
            // di parsing ke view
            $data = array(
                'admin' => $data_admin, 
                'profil' => $data_profil,
                'klasikal' => $klasikal, 
            );

            $this->load->view('guru/header',$data);
            $this->load->view('guru/rpl_kelompok',$data);
            $this->load->view('guru/footer',$data);
        }
    }

    public function rpl_kelas_besar()
	{
        if ($this->session->userdata('status') != "loginguru"){
            redirect(base_url('siswa'));
        } else {
            // mengambil data2 dari table admin
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $klasikal = $this->m_data->select_where(array('id_rpl' => "3"),'rpl')->row();
            // di parsing ke view
            $data = array(
                'admin' => $data_admin, 
                'profil' => $data_profil, 
                'klasikal' => $klasikal,
            );

            $this->load->view('guru/header',$data);
            $this->load->view('guru/rpl_kelas_besar',$data);
            $this->load->view('guru/footer',$data);
        }
    }

    public function rpl_individu()
	{
        if ($this->session->userdata('status') != "loginguru"){
            redirect(base_url('siswa'));
        } else {
            // mengambil data2 dari table admin
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $klasikal = $this->m_data->select_where(array('id_rpl' => "4"),'rpl')->row();
            // di parsing ke view
            $data = array(
                'admin' => $data_admin, 
                'profil' => $data_profil, 
                'klasikal' => $klasikal,
            );

            $this->load->view('guru/header',$data);
            $this->load->view('guru/rpl_individu',$data);
            $this->load->view('guru/footer',$data);
        }
    }

    public function profil_saya()
	{
        if ($this->session->userdata('status') != "loginsiswa"){
            redirect(base_url('guru'));
        } else {
            // mengambil data2 dari table admin
            $id_user = $this->session->userdata('id_siswa');
            $admin = $this->m_data->select_where(array('id_siswa' => $id_user),'siswa')->row();
            $jumlah = 0;
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $data_siswa = $this->m_data->tampil_data('siswa')->result();

            // di parsing ke view
            $data = array(
                'admin' => $admin, 
                'profil' => $data_profil, 
                'siswa' => $data_siswa, 
            );

            $this->load->view('siswa/header_cb',$data);
            $this->load->view('siswa/profil_saya',$data);
            $this->load->view('siswa/footer_cb',$data);
        }
    }

    public function edit_profil_saya()
    {
        
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id        = mysqli_real_escape_string($db, $this->input->post('id'));
        $nama          = mysqli_real_escape_string($db, $this->input->post('nama'));
        $nis          = mysqli_real_escape_string($db, $this->input->post('nis'));
        $jk          = mysqli_real_escape_string($db, $this->input->post('jk'));
        $ttl          = mysqli_real_escape_string($db, $this->input->post('ttl'));
        $agama          = mysqli_real_escape_string($db, $this->input->post('agama'));
        $alamat          = mysqli_real_escape_string($db, $this->input->post('alamat'));
        $email          = mysqli_real_escape_string($db, $this->input->post('email'));
        $telp          = mysqli_real_escape_string($db, $this->input->post('telp'));
        $username      = mysqli_real_escape_string($db, $this->input->post('username'));
        $password      = mysqli_real_escape_string($db, $this->input->post('password'));

        $pass_baru = hash('sha512', $password);
        $hash = password_hash($pass_baru, PASSWORD_DEFAULT);
        

        if($password == ""){
            $where = array('id_siswa' => $id );
        
            $data = array(
            'nama'        => $nama,
            'nis'        => $nis,
            'jk'        => $jk,
            'ttl'        => $ttl,
            'agama'        => $agama,
            'alamat'        => $alamat,
            'email'        => $email,
            'telp'        => $telp,
            'username'    => $username,
            'kelas'    => $kelas,
            'jurusan'    => $jurusan,
            'tahun'    => $tahun,
            );

            // ===== input data ke tabel =====             
            $this->m_data->update_data($where,$data,'siswa');

        } else {
            $where = array('id_siswa' => $id );

            $pass_baru = hash('sha512', $password);
            $hash = password_hash($pass_baru, PASSWORD_DEFAULT);
        
            $data = array(
            'nama'        => $nama,
            'nis'        => $nis,
            'jk'        => $jk,
            'ttl'        => $ttl,
            'agama'        => $agama,
            'alamat'        => $alamat,
            'email'        => $email,
            'telp'        => $telp,
            'username'    => $username,
            'password'    => $hash,
            );

            // ===== input data ke tabel =====             
            $this->m_data->update_data($where,$data,'siswa');
        }

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
                
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('siswa/profil_saya'));
    }

}