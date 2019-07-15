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
    
    public function guru()
	{
        if ($this->session->userdata('status') != "loginadmin"){
            redirect(base_url('admin'));
        } else if ($this->session->userdata('status') == "loginadmin"){
            $id_user = $this->session->userdata('id');
            $guru = $this->m_data->tampil_data('guru')->row();
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'guru' => $guru,
                'admin' => $admin,
                'breadcrumb' => 'Profil',
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
            $admin = $this->m_data->select_where(array('id_admin' => $id_user),'admin')->row();
            $data = array(
                'siswa' => $siswa,
                'admin' => $admin,
                'breadcrumb' => 'Profil',
            );
            $this->load->view('admin/header',$data);
            $this->load->view('admin/siswa',$data);
            $this->load->view('admin/footer',$data);
        }
    }
    
}
