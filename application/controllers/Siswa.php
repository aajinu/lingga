<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
    }

    public function index()
	{
        if ($this->session->userdata('status') != "loginsiswa"){
            redirect(base_url('guru'));
        } else {
            // mengambil data2 dari table admin
            $data_admin = $this->m_data->tampil_data('admin')->result();
            $data_profil = $this->m_data->tampil_data('profil')->result();

            // di parsing ke view
            $data = array(
                'admin' => $data_admin, 
                'profil' => $data_profil, 
            );

            $this->load->view('siswa/header',$data);
            $this->load->view('siswa/index',$data);
            $this->load->view('siswa/footer',$data);
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

    public function angket()
	{
        if ($this->session->userdata('status') != "loginsiswa"){
            redirect(base_url('guru'));
        } else {
            $id_user = $this->session->userdata('id_siswa');
            $admin = $this->m_data->select_where(array('id_siswa' => $id_user),'siswa')->row();
            $jumlah = 0;

            $jumlah_pribadi = $this->m_data->select_where(array('bidang' => 'pribadi','id_siswa' => $id_user),'angket_pilihan')->num_rows();
            $jumlah_sosial = $this->m_data->select_where(array('bidang' => 'sosial','id_siswa' => $id_user),'angket_pilihan')->num_rows();
            $jumlah_belajar = $this->m_data->select_where(array('bidang' => 'belajar','id_siswa' => $id_user),'angket_pilihan')->num_rows();
            $jumlah_karir = $this->m_data->select_where(array('bidang' => 'karir','id_siswa' => $id_user),'angket_pilihan')->num_rows();
            if($jumlah_pribadi == 0){
                $pribadi = $this->m_data->select_where(array('bidang' => 'pribadi'),'angket')->result();
                $jumlah_soal = $this->m_data->select_where(array('bidang' => 'pribadi'),'angket')->num_rows();
            } else if ($jumlah_sosial == 0){
                $pribadi = $this->m_data->select_where(array('bidang' => 'sosial'),'angket')->result();
                $jumlah_soal = $this->m_data->select_where(array('bidang' => 'sosial'),'angket')->num_rows();
            } else if ($jumlah_belajar == 0){
                $pribadi = $this->m_data->select_where(array('bidang' => 'belajar'),'angket')->result();
                $jumlah_soal = $this->m_data->select_where(array('bidang' => 'belajar'),'angket')->num_rows();
            } else if ($jumlah_karir == 0){
                $pribadi = $this->m_data->select_where(array('bidang' => 'karir'),'angket')->result();
                $jumlah_soal = $this->m_data->select_where(array('bidang' => 'karir'),'angket')->num_rows();
            } else {
                $jumlah = 1;
                $pribadi = 0;
                $jumlah_soal = 0;
            }


            // di parsing ke view
            $data = array(
                'admin'         => $admin,
                'pribadi'       => $pribadi,
                'jumlah_soal'   => $jumlah_soal,
                'jumlah'        => $jumlah,
            );

            $this->load->view('siswa/header_cb',$data);
            $this->load->view('siswa/angket',$data);
            $this->load->view('siswa/footer_cb',$data);
        }
    }


    public function jawaban_angket()
	{
        global $date;
        $db = get_instance()->db->conn_id;
        if ($this->session->userdata('status') != "loginsiswa"){
            redirect(base_url('guru'));
        } else {
            $jumlah_soal = mysqli_real_escape_string($db, $this->input->post('jumlah_soal'));
            $id_bidang = mysqli_real_escape_string($db, $this->input->post('id_bidang'));
            $id_user = $this->session->userdata('id_siswa');
            $x = 1;
 
            while($x <= $jumlah_soal) {
                $id_angket = mysqli_real_escape_string($db, $this->input->post('id_angket'.$x));
                $id_jawaban = mysqli_real_escape_string($db, $this->input->post('jawaban'.$x));

                $id_user = $this->session->userdata('id_siswa');
                $cari_jawaban = $this->m_data->select_where(array('id_siswa' => $id_user,'pilihan'=>1,'id_angket'=>$id_angket),'angket_pilihan')->num_rows();
                if ($cari_jawaban == 0) {
                    $data = array(
                        'id_siswa'          => $id_user,
                        'id_angket'         => $id_angket,
                        'pilihan'           => $id_jawaban,
                        'bidang'            => $id_bidang,
                        'tanggaljam'        => $date,
                    );
            
                    // ===== input data ke tabel =====             
                    $this->m_data->input_data($data,'angket_pilihan');
                }
            $x++;
            }

            $id_user = $this->session->userdata('id_siswa');
            $cari = $this->m_data->select_where(array('id_siswa' => $id_user,'pilihan'=>1,'bidang'=>$id_bidang),'angket_pilihan')->num_rows();

            $cek = $this->m_data->select_where(array('id_siswa' => $id_user),'siswa')->row();

            echo $cari;

            if ($cari == 0) {
                $nilai = 0;
            } else if ($cari == 1){
                $nilai = 0.2;
            } else if ($cari > 1){
                $nilai = 0;
                for($i = 0; $i < $cari; $i++){
                    $nilai = $nilai+(0.2*(1-$nilai));
                    echo "<h2>Ini perulangan ke-$i</h2>";
                    echo $nilai;
                }

                echo $nilai;

            }

            
            if($cek->nilai1 == ''){
                $where = array('id_siswa' => $id_user);
    
                $data = array(
                    'nilai1'        => $nilai,
                );

                // ===== input data ke tabel =====             
                $this->m_data->update_data($where,$data,'siswa');
            } elseif ($cek->nilai2 == '') {
                $where = array('id_siswa' => $id_user);
    
                $data = array(
                    'nilai2'        => $nilai,
                );

                // ===== input data ke tabel =====             
                $this->m_data->update_data($where,$data,'siswa');
            } elseif ($cek->nilai3 == '') {
                $where = array('id_siswa' => $id_user);
    
                $data = array(
                    'nilai3'        => $nilai,
                );

                // ===== input data ke tabel =====             
                $this->m_data->update_data($where,$data,'siswa');
            } elseif ($cek->nilai4 == '') {
                $where = array('id_siswa' => $id_user);
    
                $data = array(
                    'nilai4'        => $nilai,
                );

                // ===== input data ke tabel =====             
                $this->m_data->update_data($where,$data,'siswa');
            }
            

            redirect(base_url('siswa/angket'));

        }
    }

}