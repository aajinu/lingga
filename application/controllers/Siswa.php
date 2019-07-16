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
                
                $data = array(
                    'id_siswa'          => $id_user,
                    'id_angket'         => $id_angket,
                    'pilihan'           => $id_jawaban,
                    'bidang'            => $id_bidang,
                    'tanggaljam'        => $date,
                );
        
                // ===== input data ke tabel =====             
                $this->m_data->input_data($data,'angket_pilihan');
            $x++;
            }

            redirect(base_url('siswa/angket'));
        }
    }

}