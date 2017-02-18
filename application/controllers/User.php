<?php


/**
 * Description of Auth
 *
 * @author bsujatmiko.github.io
 */
class User extends CI_Controller{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->helper('form');
        
    }
    
    public function index()
    {
        
        $data['title'] = 'anggota kelas ';
        $data['users'] = $this->user_model->get_user();
        
        $this->load->view('templates/header',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');
        
    }
    
    public function profil($username = NULL)
    {
        
        $data['user'] = $this->user_model->get_user($username);
        $data['title'] = $data['user']['nama'];
        
        if (empty($data['user'])):
            show_404();
        endif;
        
        $this->load->view('templates/header',$data);
        $this->load->view('user/profil',$data);
        $this->load->view('templates/footer');
    }
    
    public function login()
    {
        $this->load->library('form_validation');
        
        $data['title'] = 'SignUp/Login';
        $data['brand'] = 'Selamat Datang Di Website Resmi TIF F 15 !!  silahkan login';
        
        
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        
        if ($this->session->has_userdata('username')):
            redirect(base_url());
        endif;
        
        $user = array(
          'username' => $username,
          'pass' => md5($pass)
        );
                
        $validate = $this->user_model->validate_data($user)->num_rows();
        
        if ($validate > 0){
            
            $data_session = array(
                'username' => $username,
                'status' => 'login'
            );
            
            $this->session->set_userdata($data_session);
            redirect(site_url().'member/profil/'.$username);
        }else{
             $this->load->view('templates/head',$data);
             $this->load->view('auth/login',$data);
             $this->load->view('templates/footer');
        }       
        
    }
    
    public function signup()
    {
        $this->load->library('form_validation');
        
        $data['title'] = 'SignUp/Login';
        $data['brand'] = 'Selamat Datang Di Website Resmi TIF F 15 !!  ayo daftar sekarang';
        
        $this->form_validation->set_rules('nama','nama lengkap','required');
        $this->form_validation->set_rules('nim','nim anda','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('pass','password anda','required');
        $this->form_validation->set_rules('gender','jenis kelamin','required');
        $this->form_validation->set_rules('alamat','alamat anda','required');
        $this->form_validation->set_rules('birthday','tanggal bulan dan tahun','required');
        
        $username = $this->input->post('username');
        
        if ($this->form_validation->run() === FALSE):
            $this->load->view('templates/head',$data);
            $this->load->view('auth/signup',$data);
            $this->load->view('templates/footer');
        else:
            $data_session = array(
                'username' => $username,
                'status' => 'login'
            );
            
            $this->session->set_userdata($data_session);
            
            $this->user_model->register_data();
            redirect('member/profil/'.$username);
        endif;
        
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('member/login');
    }
}
