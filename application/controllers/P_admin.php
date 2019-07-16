<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class P_admin extends CI_Controller {
  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}


  function login (){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $username = mysqli_real_escape_string($db, $this->input->post('username'));
    $password = mysqli_real_escape_string($db, $this->input->post('password'));



    // cek username apakah tersedia di dalam database atau tidak.
    $cek = $this->m_data->get_admin($username)->num_rows();


    if ($cek == 0) {
      // jika username tidak di temukan

        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');

        // jika username tidak tersedia dalam database,
        // maka akan di arahkan ke halaman login
        redirect(base_url('admin'));


    } else {

      // jika username ditemukan dalam database

      // baca data akun dari database
      $u = $this->m_data->get_admin($username)->row();

      // ganti isi variabel $password_user sesuai tabel
      $password_user = $u->password;

      // koreksi password
      $pass = hash('sha512', $password);
      if (password_verify($pass,$password_user)) {

          $data_session = array(
              'id'        => $u->id_admin,
              'username'  => $u->username,
              'email'     => $u->email,
              'status'    => "loginadmin"
          );

          // membuat session berdasarkan $data_session
          $this->session->set_userdata($data_session);

          // masuk ke halaman dashboard
          redirect(base_url('admin'));
      } else {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          // jika password salah,
          // maka akan di arahkan ke halaman login
          redirect(base_url('admin'));
      }
    }
  }



  function edit_profil()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date;
      $db = get_instance()->db->conn_id;

      $id_user = $this->session->userdata('id');
      $username_asli = $this->session->userdata('username');

      // mysqli_real_escape_string anti injeksi
      $username = mysqli_real_escape_string($db, $this->input->post('username'));
      $email = mysqli_real_escape_string($db, $this->input->post('email'));

      $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();

      $where = array(
        'id_admin' => $id_user
      );

      $data = array(
        'username' => $username,
        'email' => $email,
      );

      // update modified (jika di perlukan dalam tabel)
      $query = $this->m_data->update_data($where,$data,'admin');

      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Perubahan berhasil!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');

      redirect(base_url('admin/profil'));
    }
  }



  function edit_password (){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $password_lama = mysqli_real_escape_string($db, $this->input->post('password_lama'));
    $password_baru = mysqli_real_escape_string($db, $this->input->post('password_baru'));
    $konf_password = mysqli_real_escape_string($db, $this->input->post('konfirmasi_password'));

    $id_user = $this->session->userdata('id');
    $u = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();

    // ganti isi variabel $password_user sesuai tabel
    $password_user = $u->password;

    // koreksi password
    $pass = hash('sha512', $password_lama);
    if (password_verify($pass,$password_user)) {
      //logic ganti password
      if ($password_baru != $konf_password) {
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Password baru dan Konfirmasi password tidak cocok!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        // jika password salah,
        // maka akan di arahkan ke halaman login
        redirect(base_url('admin/profil'));
      } else {
        $where = array(
          'id_admin' => $id_user
        );

        $pass_baru = hash('sha512', $password_baru);
        $hash = password_hash($pass_baru, PASSWORD_DEFAULT);

        $data = array(
          'password'      => $hash,
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'admin');

        redirect(base_url('p_admin/logout'));
      }
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger"> Password lama salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
      // jika password salah,
      // maka akan di arahkan ke halaman login
      redirect(base_url('admin/profil'));
    }

  }



  function edit_guru()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date;
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $username = mysqli_real_escape_string($db, $this->input->post('username'));
      $email = mysqli_real_escape_string($db, $this->input->post('email'));
      $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
      $nohp = mysqli_real_escape_string($db, $this->input->post('nohp'));

      $where = array(
        'id_guru' => 1
      );

      $data = array(
        'username' => $username,
        'email' => $email,
        'guru' => $nama,
        'nohp' => $nohp,
      );

      // update modified (jika di perlukan dalam tabel)
      $query = $this->m_data->update_data($where,$data,'guru');

      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Perubahan berhasil!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');

      redirect(base_url('admin/guru'));
    }
  }



  function edit_password_guru()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date;
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $password_baru = mysqli_real_escape_string($db, $this->input->post('password_baru'));
      $konfirmasi_password = mysqli_real_escape_string($db, $this->input->post('konfirmasi_password'));

      if($password_baru != $konfirmasi_password){
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Password baru dan Konfirmasi password tidak cocok!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        // jika password salah,
        // maka akan di arahkan ke halaman login
        redirect(base_url('admin/guru'));
      } else {
        $where = array(
          'id_guru' => 1
        );

        $pass_baru = hash('sha512', $password_baru);
        $hash = password_hash($pass_baru, PASSWORD_DEFAULT);
  
        $data = array(
          'password' => $hash,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'guru');
  
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');
  
        redirect(base_url('admin/guru'));
      }


    }
  }



  public function tambah_siswa()
  {
      global $date;
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
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
      $kelas      = mysqli_real_escape_string($db, $this->input->post('kelas'));
      $jurusan      = mysqli_real_escape_string($db, $this->input->post('jurusan'));
      $tahun      = mysqli_real_escape_string($db, $this->input->post('tahun'));

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
          'kelas'    => $kelas,
          'jurusan'    => $jurusan,
          'tahun'    => $tahun,
      );

      // ===== input data ke tabel =====             
      $this->m_data->input_data($data,'siswa');

      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/siswa'));
  }

  public function tambah_guru()
  {
      global $date;
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
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
      $this->m_data->input_data($data,'guru');

      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/guru'));
  }


  public function hapus_siswa($kode)
  {
      $where = array('id_siswa' => $kode);

      $this->m_data->hapus_data($where,'siswa');
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/siswa'));
  }

  public function hapus_guru($kode)
  {
      $where = array('id_guru' => $kode);

      $this->m_data->hapus_data($where,'guru');
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/guru'));
  }

  public function hapus_kelas($kode)
  {
      $where = array('id_kelas' => $kode);

      $this->m_data->hapus_data($where,'kelas');
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/kelas'));
  }



  public function ubah_siswa()
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
      $kelas      = mysqli_real_escape_string($db, $this->input->post('kelas'));
      $jurusan      = mysqli_real_escape_string($db, $this->input->post('jurusan'));
      $tahun      = mysqli_real_escape_string($db, $this->input->post('tahun'));

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
          'kelas'    => $kelas,
          'jurusan'    => $jurusan,
          'tahun'    => $tahun,
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
      redirect(base_url('admin/siswa'));
  }

  public function tambah_kelas()
  {
      global $date;
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $kelas          = mysqli_real_escape_string($db, $this->input->post('kelas'));
      $jurusan          = mysqli_real_escape_string($db, $this->input->post('jurusan'));
      
      $data = array(
          'kelas'        => $kelas,
          'jurusan'        => $jurusan,
      );

      // ===== input data ke tabel =====             
      $this->m_data->input_data($data,'kelas');
      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Data berhasil Ditambah!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');

      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/kelas'));
  }

  public function ubah_kelas()
  {
      
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $id        = mysqli_real_escape_string($db, $this->input->post('id'));
      $kelas      = mysqli_real_escape_string($db, $this->input->post('kelas'));
      $jurusan      = mysqli_real_escape_string($db, $this->input->post('jurusan'));

      $where = array('id_kelas' => $id );
     
        $data = array(          
          'kelas'    => $kelas,
          'jurusan'    => $jurusan,
        );


        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'kelas');
      

      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Perubahan berhasil!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');
              
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/kelas'));
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }



}


?>
