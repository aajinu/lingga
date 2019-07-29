<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class Welcome extends CI_Controller {
// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
        if ($this->session->userdata('status') == "loginguru"){
            redirect(base_url('guru'));
        } else if ($this->session->userdata('status') == "loginsiswa") {
            redirect(base_url('siswa'));
        } else {
            $this->load->view('halamandepan/login');
        }
    }


    function login (){
        $db = get_instance()->db->conn_id;
        // mysqli_real_escape_string anti injeksi
        $username = mysqli_real_escape_string($db, $this->input->post('username'));
        $password = mysqli_real_escape_string($db, $this->input->post('password'));
        $level = mysqli_real_escape_string($db, $this->input->post('level'));

        if ($level == 1) {
            // cek username apakah tersedia di dalam database atau tidak.
            $cek = $this->m_data->get_user($username,'guru')->num_rows();


            if ($cek == 0) {
                // jika username tidak di temukan

                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                ');

                // jika username tidak tersedia dalam database,
                // maka akan di arahkan ke halaman login
                redirect(base_url());


            } else {

                // jika username ditemukan dalam database

                // baca data akun dari database
                $u = $this->m_data->get_user($username,'guru')->row();

                // ganti isi variabel $password_user sesuai tabel
                $password_user = $u->password;

                // koreksi password
                $pass = hash('sha512', $password);
                if (password_verify($pass,$password_user)) {

                    $data_session = array(
                        'id_guru'           => $u->id_guru,
                        'username_guru'     => $u->username,
                        'email_guru'        => $u->email,
                        'status'            => "loginguru"
                    );

                    // membuat session berdasarkan $data_session
                    $this->session->set_userdata($data_session);

                    // masuk ke halaman dashboard
                    redirect(base_url('guru'));
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    ');
                    // jika password salah,
                    // maka akan di arahkan ke halaman login
                    redirect(base_url());
                }
            }
        } else {
            // cek username apakah tersedia di dalam database atau tidak.
            $cek = $this->m_data->get_user($username,'siswa')->num_rows();


            if ($cek == 0) {
                // jika username tidak di temukan

                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                ');

                // jika username tidak tersedia dalam database,
                // maka akan di arahkan ke halaman login
                redirect(base_url());


            } else {

                // jika username ditemukan dalam database

                // baca data akun dari database
                $u = $this->m_data->get_user($username,'siswa')->row();
                echo $u->id_siswa;

                // ganti isi variabel $password_user sesuai tabel
                $password_user = $u->password;

                // koreksi password
                $pass = hash('sha512', $password);
                if (password_verify($pass,$password_user)) {

                    $data_session = array(
                        'id_siswa'           => $u->id_siswa,
                        'username_siswa'     => $u->username,
                        'email_siswa'        => $u->email,
                        'status'            => "loginsiswa"
                    );

                    // membuat session berdasarkan $data_session
                    $this->session->set_userdata($data_session);

                    // masuk ke halaman dashboard
                    redirect(base_url('siswa'));
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    ');
                    // jika password salah,
                    // maka akan di arahkan ke halaman login
                    redirect(base_url());
                }
            }
        }
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
        $soal = str_ireplace(array("\r","\n",'\r','\n'),'', $soal);
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



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
