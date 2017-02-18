<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    /**
     * @author bsujatmiko.github.io
     */
    
    class Pages extends CI_Controller
    {
        function __construct() {
            parent::__construct();
            $this->load->helper('url');
        }
//        
//        public function index(){
//            $data['title'] = 'Selamat datang di Website Resmi kelas F angkatan 15';
//            
//            $this->load->view('templates/header',$data);
//            $this->load->view('pages/home');
//            $this->load->view('templates/footer');
//        }
        
        public function view($pages = 'home'){
            
            if (!file_exists(APPPATH.'views/pages/'.$pages.'.php')):
                show_404();
            endif;
            
            $data['title'] = ucfirst($pages);
            
            $this->load->view('templates/header',$data);
            $this->load->view('pages/'.$pages,$data);
            $this->load->view('templates/footer');
            
        }
    }
