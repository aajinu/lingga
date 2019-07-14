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


  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }



}


?>
