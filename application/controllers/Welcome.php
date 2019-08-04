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

    public function profil_guru()
	{
       
            // mengambil data2 dari table admin
            $id_user = $this->session->userdata('id_guru');
            $admin = $this->m_data->select_where(array('id_guru' => $id_user),'guru')->row();
            $jumlah = 0;
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();
            $guru = $this->m_data->tampil_data('guru')->result();

            // di parsing ke view
            $data = array(
                'admin' => $admin, 
                'profil' => $data_profil, 
                'guru' => $guru, 
            );

            
            $this->load->view('profil_guru',$data);
            
        
    }

    public function ubah_profil_guru()
  {
      
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $id        = mysqli_real_escape_string($db, $this->input->post('id'));
      $nama          = mysqli_real_escape_string($db, $this->input->post('nama'));
      $nip          = mysqli_real_escape_string($db, $this->input->post('nip'));
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
        $where = array('id_guru' => $id );
      
        $data = array(
          'nama'        => $nama,
          'nip'        => $nip,
          'jk'        => $jk,
          'ttl'        => $ttl,
          'agama'        => $agama,
          'alamat'        => $alamat,
          'email'        => $email,
          'telp'        => $telp,
          'username'    => $username,
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'guru');

      } else {
        $where = array('id_guru' => $id );

        $pass_baru = hash('sha512', $password);
        $hash = password_hash($pass_baru, PASSWORD_DEFAULT);
      
        $data = array(
          'nama'        => $nama,
          'nip'        => $nip,
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
        $this->m_data->update_data($where,$data,'guru');
      }

      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Perubahan berhasil!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');
              
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('welcome/profil_guru'));
  }

  public function ubah_rpl_klasikal()
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

            
            $this->load->view('ubah_rpl_klasikal',$data);
            
        }
    }

    public function ubah_rpl_kelompok()
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

            
            $this->load->view('ubah_rpl_kelompok',$data);
            
        }
    }

    public function ubah_rpl_kelas_besar()
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

            
            $this->load->view('ubah_rpl_kelas_besar',$data);
            
        }
    }

    public function ubah_rpl_individual()
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

            
            $this->load->view('ubah_rpl_individual',$data);
            
        }
    }

    public function proses_individual()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $judul      = mysqli_real_escape_string($db, $this->input->post('judul'));
        $tahun        = mysqli_real_escape_string($db, $this->input->post('tahun'));
        $kl        = mysqli_real_escape_string($db, $this->input->post('kl'));
        $bl        = mysqli_real_escape_string($db, $this->input->post('bl'));
        $ttl        = mysqli_real_escape_string($db, $this->input->post('ttl'));
        $fl        = mysqli_real_escape_string($db, $this->input->post('fl'));
        $tu        = mysqli_real_escape_string($db, $this->input->post('tu'));
        $tk1        = mysqli_real_escape_string($db, $this->input->post('tk1'));
        $tk2        = mysqli_real_escape_string($db, $this->input->post('tk2'));
        $tk3        = mysqli_real_escape_string($db, $this->input->post('tk3'));
        $sl        = mysqli_real_escape_string($db, $this->input->post('sl'));
                
        $where = array('id_rpl' => $id );
        
        $data = array(             
            'judul'   =>  $judul,
            'tahun'   =>   $tahun,
            'kl'   =>   $kl,
            'bl'    =>   $bl,
            'ttl'    =>   $ttl,
            'fl'    =>   $fl,
            'tu'      =>   $tu,
            'tk1'      =>   $tk1,
            'tk2'      =>   $tk2,
            'tk3'      =>   $tk3,
            'sl'      =>   $sl,        
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'rpl');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/ubah_rpl_individual'));
    }

    public function proses_klasikal()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $judul      = mysqli_real_escape_string($db, $this->input->post('judul'));
        $tahun        = mysqli_real_escape_string($db, $this->input->post('tahun'));
        $kl        = mysqli_real_escape_string($db, $this->input->post('kl'));
        $bl        = mysqli_real_escape_string($db, $this->input->post('bl'));
        $ttl        = mysqli_real_escape_string($db, $this->input->post('ttl'));
        $fl        = mysqli_real_escape_string($db, $this->input->post('fl'));
        $tu        = mysqli_real_escape_string($db, $this->input->post('tu'));
        $tk1        = mysqli_real_escape_string($db, $this->input->post('tk1'));
        $tk2        = mysqli_real_escape_string($db, $this->input->post('tk2'));
        $tk3        = mysqli_real_escape_string($db, $this->input->post('tk3'));
        $sl        = mysqli_real_escape_string($db, $this->input->post('sl'));
        $ml1        = mysqli_real_escape_string($db, $this->input->post('ml1'));
        $ml2       = mysqli_real_escape_string($db, $this->input->post('ml2'));
        $ml3        = mysqli_real_escape_string($db, $this->input->post('ml3'));
        $waktu        = mysqli_real_escape_string($db, $this->input->post('waktu'));
        $sumber1        = mysqli_real_escape_string($db, $this->input->post('sumber1'));
        $sumber2        = mysqli_real_escape_string($db, $this->input->post('sumber2'));
        $sumber3        = mysqli_real_escape_string($db, $this->input->post('sumber3'));
        $sumber4        = mysqli_real_escape_string($db, $this->input->post('sumber4'));
        $mt        = mysqli_real_escape_string($db, $this->input->post('mt'));
        $ma        = mysqli_real_escape_string($db, $this->input->post('ma'));
        $pt1        = mysqli_real_escape_string($db, $this->input->post('pt1'));
        $pt2        = mysqli_real_escape_string($db, $this->input->post('pt2'));
        $pt3        = mysqli_real_escape_string($db, $this->input->post('pt3'));
        $pt4        = mysqli_real_escape_string($db, $this->input->post('pt4'));
        $pt5        = mysqli_real_escape_string($db, $this->input->post('pt5'));
        $pt6        = mysqli_real_escape_string($db, $this->input->post('pt6'));
        $pt7        = mysqli_real_escape_string($db, $this->input->post('pt7'));
        $pt8        = mysqli_real_escape_string($db, $this->input->post('pt8'));
        $kpd1        = mysqli_real_escape_string($db, $this->input->post('kpd1'));
        $kpd2        = mysqli_real_escape_string($db, $this->input->post('kpd2'));
        $kpd3        = mysqli_real_escape_string($db, $this->input->post('kpd3'));
        $kpd4        = mysqli_real_escape_string($db, $this->input->post('kpd4'));
        $kg1        = mysqli_real_escape_string($db, $this->input->post('kg1'));
        $kg2        = mysqli_real_escape_string($db, $this->input->post('kg2'));
        $tp1        = mysqli_real_escape_string($db, $this->input->post('tp1'));
        $tp2        = mysqli_real_escape_string($db, $this->input->post('tp2'));
        $ep1        = mysqli_real_escape_string($db, $this->input->post('ep1'));
        $ep2        = mysqli_real_escape_string($db, $this->input->post('ep2'));
        $ep3        = mysqli_real_escape_string($db, $this->input->post('ep3'));
        $ep4        = mysqli_real_escape_string($db, $this->input->post('ep4'));
        $eh1        = mysqli_real_escape_string($db, $this->input->post('eh1'));
        $eh2        = mysqli_real_escape_string($db, $this->input->post('eh2'));
        $eh3        = mysqli_real_escape_string($db, $this->input->post('eh3'));
        $eh4        = mysqli_real_escape_string($db, $this->input->post('eh4'));
                
        $where = array('id_rpl' => $id );
        
        $data = array(             
            'judul'   =>  $judul,
            'tahun'   =>   $tahun,
            'kl'   =>   $kl,
            'bl'    =>   $bl,
            'ttl'    =>   $ttl,
            'fl'    =>   $fl,
            'tu'      =>   $tu,
            'tk1'      =>   $tk1,
            'tk2'      =>   $tk2,
            'tk3'      =>   $tk3,
            'sl'      =>   $sl,
            'ml1'      =>   $ml1,
            'ml2'      =>   $ml2,
            'ml3'      =>   $ml3,
            'waktu'      =>   $waktu,
            'sumber1'       =>   $sumber1,
            'sumber2'       =>   $sumber2,
            'sumber3'       =>   $sumber3,
            'sumber4'       =>   $sumber4,
            'mt'       =>   $mt,
            'ma'       =>   $ma,
            'pt1'       =>   $pt1,
            'pt2'      =>   $pt2,
            'pt3'       =>   $pt3,
            'pt4'        =>   $pt4,
            'pt5'       =>   $pt5,
            'pt6'       =>   $pt6,
            'pt7'       =>   $pt7,
            'pt8'       =>   $pt8,
            'kpd1'      =>   $kpd1,
            'kpd2'      =>   $kpd2,
            'kpd3'      =>   $kpd3,
            'kpd4'      =>   $kpd4,
            'kg1'      =>   $kg1,
            'kg2'      =>   $kg2,
            'tp1'      =>   $tp1,
            'tp2'      =>   $tp2,
            'ep1'     =>   $ep1,
            'ep2'      =>   $ep2,
            'ep3'      =>   $ep3,
            'ep4'      =>   $ep4,
            'eh1'      =>   $eh1,
            'eh2'      =>   $eh2,
            'eh3'      =>   $eh3,
            'eh4'     =>   $eh4,          
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'rpl');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/ubah_rpl_klasikal'));
    }

    public function proses_kelompok()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $judul      = mysqli_real_escape_string($db, $this->input->post('judul'));
        $tahun        = mysqli_real_escape_string($db, $this->input->post('tahun'));
        $kl        = mysqli_real_escape_string($db, $this->input->post('kl'));
        $bl        = mysqli_real_escape_string($db, $this->input->post('bl'));
        $ttl        = mysqli_real_escape_string($db, $this->input->post('ttl'));
        $fl        = mysqli_real_escape_string($db, $this->input->post('fl'));
        $tu        = mysqli_real_escape_string($db, $this->input->post('tu'));
        $tk1        = mysqli_real_escape_string($db, $this->input->post('tk1'));
        $tk2        = mysqli_real_escape_string($db, $this->input->post('tk2'));
        $tk3        = mysqli_real_escape_string($db, $this->input->post('tk3'));
        $sl        = mysqli_real_escape_string($db, $this->input->post('sl'));
        $ml1        = mysqli_real_escape_string($db, $this->input->post('ml1'));
        $ml2       = mysqli_real_escape_string($db, $this->input->post('ml2'));
        $ml3        = mysqli_real_escape_string($db, $this->input->post('ml3'));
        $waktu        = mysqli_real_escape_string($db, $this->input->post('waktu'));
        $sumber1        = mysqli_real_escape_string($db, $this->input->post('sumber1'));
        $sumber2        = mysqli_real_escape_string($db, $this->input->post('sumber2'));
        $sumber3        = mysqli_real_escape_string($db, $this->input->post('sumber3'));
        $sumber4        = mysqli_real_escape_string($db, $this->input->post('sumber4'));
        $mt        = mysqli_real_escape_string($db, $this->input->post('mt'));
        $ma        = mysqli_real_escape_string($db, $this->input->post('ma'));
        $pt1        = mysqli_real_escape_string($db, $this->input->post('pt1'));
        $pt2        = mysqli_real_escape_string($db, $this->input->post('pt2'));
        $pt3        = mysqli_real_escape_string($db, $this->input->post('pt3'));
        $pt4        = mysqli_real_escape_string($db, $this->input->post('pt4'));
        $pt5        = mysqli_real_escape_string($db, $this->input->post('pt5'));
        $pt6        = mysqli_real_escape_string($db, $this->input->post('pt6'));
        $pt7        = mysqli_real_escape_string($db, $this->input->post('pt7'));
        $pt8        = mysqli_real_escape_string($db, $this->input->post('pt8'));
        $kpd1        = mysqli_real_escape_string($db, $this->input->post('kpd1'));
        $kpd2        = mysqli_real_escape_string($db, $this->input->post('kpd2'));
        $kpd3        = mysqli_real_escape_string($db, $this->input->post('kpd3'));
        $kpd4        = mysqli_real_escape_string($db, $this->input->post('kpd4'));
        $kg1        = mysqli_real_escape_string($db, $this->input->post('kg1'));
        $kg2        = mysqli_real_escape_string($db, $this->input->post('kg2'));
        $tp1        = mysqli_real_escape_string($db, $this->input->post('tp1'));
        $tp2        = mysqli_real_escape_string($db, $this->input->post('tp2'));
        $ep1        = mysqli_real_escape_string($db, $this->input->post('ep1'));
        $ep2        = mysqli_real_escape_string($db, $this->input->post('ep2'));
        $ep3        = mysqli_real_escape_string($db, $this->input->post('ep3'));
        $ep4        = mysqli_real_escape_string($db, $this->input->post('ep4'));
        $eh1        = mysqli_real_escape_string($db, $this->input->post('eh1'));
        $eh2        = mysqli_real_escape_string($db, $this->input->post('eh2'));
        $eh3        = mysqli_real_escape_string($db, $this->input->post('eh3'));
        $eh4        = mysqli_real_escape_string($db, $this->input->post('eh4'));
                
        $where = array('id_rpl' => $id );
        
        $data = array(             
            'judul'   =>  $judul,
            'tahun'   =>   $tahun,
            'kl'   =>   $kl,
            'bl'    =>   $bl,
            'ttl'    =>   $ttl,
            'fl'    =>   $fl,
            'tu'      =>   $tu,
            'tk1'      =>   $tk1,
            'tk2'      =>   $tk2,
            'tk3'      =>   $tk3,
            'sl'      =>   $sl,
            'ml1'      =>   $ml1,
            'ml2'      =>   $ml2,
            'ml3'      =>   $ml3,
            'waktu'      =>   $waktu,
            'sumber1'       =>   $sumber1,
            'sumber2'       =>   $sumber2,
            'sumber3'       =>   $sumber3,
            'sumber4'       =>   $sumber4,
            'mt'       =>   $mt,
            'ma'       =>   $ma,
            'pt1'       =>   $pt1,
            'pt2'      =>   $pt2,
            'pt3'       =>   $pt3,
            'pt4'        =>   $pt4,
            'pt5'       =>   $pt5,
            'pt6'       =>   $pt6,
            'pt7'       =>   $pt7,
            'pt8'       =>   $pt8,
            'kpd1'      =>   $kpd1,
            'kpd2'      =>   $kpd2,
            'kpd3'      =>   $kpd3,
            'kpd4'      =>   $kpd4,
            'kg1'      =>   $kg1,
            'kg2'      =>   $kg2,
            'tp1'      =>   $tp1,
            'tp2'      =>   $tp2,
            'ep1'     =>   $ep1,
            'ep2'      =>   $ep2,
            'ep3'      =>   $ep3,
            'ep4'      =>   $ep4,
            'eh1'      =>   $eh1,
            'eh2'      =>   $eh2,
            'eh3'      =>   $eh3,
            'eh4'     =>   $eh4,          
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'rpl');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/ubah_rpl_kelompok'));
    }

    public function proses_kelas_besar()
    {
       
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $judul      = mysqli_real_escape_string($db, $this->input->post('judul'));
        $tahun        = mysqli_real_escape_string($db, $this->input->post('tahun'));
        $kl        = mysqli_real_escape_string($db, $this->input->post('kl'));
        $bl        = mysqli_real_escape_string($db, $this->input->post('bl'));
        $ttl        = mysqli_real_escape_string($db, $this->input->post('ttl'));
        $fl        = mysqli_real_escape_string($db, $this->input->post('fl'));
        $tu        = mysqli_real_escape_string($db, $this->input->post('tu'));
        $tk1        = mysqli_real_escape_string($db, $this->input->post('tk1'));
        $tk2        = mysqli_real_escape_string($db, $this->input->post('tk2'));
        $tk3        = mysqli_real_escape_string($db, $this->input->post('tk3'));
        $sl        = mysqli_real_escape_string($db, $this->input->post('sl'));
        $ml1        = mysqli_real_escape_string($db, $this->input->post('ml1'));
        $ml2       = mysqli_real_escape_string($db, $this->input->post('ml2'));
        $ml3        = mysqli_real_escape_string($db, $this->input->post('ml3'));
        $waktu        = mysqli_real_escape_string($db, $this->input->post('waktu'));
        $sumber1        = mysqli_real_escape_string($db, $this->input->post('sumber1'));
        $sumber2        = mysqli_real_escape_string($db, $this->input->post('sumber2'));
        $sumber3        = mysqli_real_escape_string($db, $this->input->post('sumber3'));
        $sumber4        = mysqli_real_escape_string($db, $this->input->post('sumber4'));
        $mt        = mysqli_real_escape_string($db, $this->input->post('mt'));
        $ma        = mysqli_real_escape_string($db, $this->input->post('ma'));
        $pt1        = mysqli_real_escape_string($db, $this->input->post('pt1'));
        $pt2        = mysqli_real_escape_string($db, $this->input->post('pt2'));
        $pt3        = mysqli_real_escape_string($db, $this->input->post('pt3'));
        $pt4        = mysqli_real_escape_string($db, $this->input->post('pt4'));
        $pt5        = mysqli_real_escape_string($db, $this->input->post('pt5'));
        $pt6        = mysqli_real_escape_string($db, $this->input->post('pt6'));
        $pt7        = mysqli_real_escape_string($db, $this->input->post('pt7'));
        $pt8        = mysqli_real_escape_string($db, $this->input->post('pt8'));
        $kpd1        = mysqli_real_escape_string($db, $this->input->post('kpd1'));
        $kpd2        = mysqli_real_escape_string($db, $this->input->post('kpd2'));
        $kpd3        = mysqli_real_escape_string($db, $this->input->post('kpd3'));
        $kpd4        = mysqli_real_escape_string($db, $this->input->post('kpd4'));
        $kg1        = mysqli_real_escape_string($db, $this->input->post('kg1'));
        $kg2        = mysqli_real_escape_string($db, $this->input->post('kg2'));
        $tp1        = mysqli_real_escape_string($db, $this->input->post('tp1'));
        $tp2        = mysqli_real_escape_string($db, $this->input->post('tp2'));
        $ep1        = mysqli_real_escape_string($db, $this->input->post('ep1'));
        $ep2        = mysqli_real_escape_string($db, $this->input->post('ep2'));
        $ep3        = mysqli_real_escape_string($db, $this->input->post('ep3'));
        $ep4        = mysqli_real_escape_string($db, $this->input->post('ep4'));
        $eh1        = mysqli_real_escape_string($db, $this->input->post('eh1'));
        $eh2        = mysqli_real_escape_string($db, $this->input->post('eh2'));
        $eh3        = mysqli_real_escape_string($db, $this->input->post('eh3'));
        $eh4        = mysqli_real_escape_string($db, $this->input->post('eh4'));
                
        $where = array('id_rpl' => $id );
        
        $data = array(             
            'judul'   =>  $judul,
            'tahun'   =>   $tahun,
            'kl'   =>   $kl,
            'bl'    =>   $bl,
            'ttl'    =>   $ttl,
            'fl'    =>   $fl,
            'tu'      =>   $tu,
            'tk1'      =>   $tk1,
            'tk2'      =>   $tk2,
            'tk3'      =>   $tk3,
            'sl'      =>   $sl,
            'ml1'      =>   $ml1,
            'ml2'      =>   $ml2,
            'ml3'      =>   $ml3,
            'waktu'      =>   $waktu,
            'sumber1'       =>   $sumber1,
            'sumber2'       =>   $sumber2,
            'sumber3'       =>   $sumber3,
            'sumber4'       =>   $sumber4,
            'mt'       =>   $mt,
            'ma'       =>   $ma,
            'pt1'       =>   $pt1,
            'pt2'      =>   $pt2,
            'pt3'       =>   $pt3,
            'pt4'        =>   $pt4,
            'pt5'       =>   $pt5,
            'pt6'       =>   $pt6,
            'pt7'       =>   $pt7,
            'pt8'       =>   $pt8,
            'kpd1'      =>   $kpd1,
            'kpd2'      =>   $kpd2,
            'kpd3'      =>   $kpd3,
            'kpd4'      =>   $kpd4,
            'kg1'      =>   $kg1,
            'kg2'      =>   $kg2,
            'tp1'      =>   $tp1,
            'tp2'      =>   $tp2,
            'ep1'     =>   $ep1,
            'ep2'      =>   $ep2,
            'ep3'      =>   $ep3,
            'ep4'      =>   $ep4,
            'eh1'      =>   $eh1,
            'eh2'      =>   $eh2,
            'eh3'      =>   $eh3,
            'eh4'     =>   $eh4,          
        );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'rpl');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/ubah_rpl_kelas_besar'));
    }

    public function hasil_angket($kodekelas = '')
	{
        // mengambil data2 dari table admin
        $data_angket = $this->m_data->tampil_data('angket')->result();
        
        $kelas = $this->db->get('kelas')->result();
        // di parsing ke view
        if ($kodekelas == '') {
            $siswa = $this->db->get('siswa')->result();
        } else {
            $siswa = $this->m_data->select_where(array('kelas' => $kodekelas),'siswa')->result();
        }

        $data = array(
            'siswa' => $siswa,
            'angket' => $data_angket, 
            'kelas' => $kelas,
            'kodekelas' => $kodekelas,
        );

        // menampilkan view index
		$this->load->view('hasil_angket',$data);
    }

    public function ambil_kelas()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $kelas      = mysqli_real_escape_string($db, $this->input->post('kelas'));

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('welcome/hasil_angket/'.$kelas));
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
