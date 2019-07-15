<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$date 		= date("Y-m-d H:i:s");

class admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            $this->load->view('admin/login');
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'admin' => $admin,
                'breadcrumb' => 'Beranda',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/dashboard',$data);
            $this->load->view('admin/footer',$data);
        }
    }



    public function profil()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'admin' => $admin,
                'breadcrumb' => 'Profil',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/profil',$data);
            $this->load->view('admin/footer',$data);
        }
    }

    public function profil_sekolah()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $profil = $this->m_data->tampil_data('profil')->row();
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'profil' => $profil,
                'admin' => $admin,
                'breadcrumb' => 'Profil Sekolah',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/profil_sekolah',$data);
            $this->load->view('admin/footer',$data);
        }
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
        redirect(base_url('admin/profil_sekolah'));
    }
    
    public function guru()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $guru = $this->m_data->tampil_data('guru')->result();
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'guru' => $guru,
                'admin' => $admin,
                'breadcrumb' => 'Guru',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/guru',$data);
            $this->load->view('admin/footer',$data);
        }
    }

    public function siswa()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $this->db->order_by('id_siswa', 'DESC');
            $siswa = $this->db->get('siswa')->result();
            $kelas = $this->db->get('kelas')->result();
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'siswa' => $siswa,
                'kelas' => $kelas,
                'admin' => $admin,
                'breadcrumb' => 'Siswa',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/siswa',$data);
            $this->load->view('admin/footer',$data);
        }
    }

    public function kelas()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $this->db->order_by('id_kelas', 'DESC');
            $kelas = $this->db->get('kelas')->result();
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'kelas' => $kelas,
                'admin' => $admin,
                'breadcrumb' => 'Kelas',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/kelas',$data);
            $this->load->view('admin/footer',$data);
        }
    }
    
}
