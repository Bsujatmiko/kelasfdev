<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Berita
 *
 * @author User
 */
class Blog extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url_helper');
    }
    
    public function index(){
        $data['title'] = 'Blog F Class';
        $data['berita'] = $this->blog_model->get_berita();
        
        $this->load->view('templates/header',$data);
        $this->load->view('blog/index',$data);
        $this->load->view('templates/footer');
    }
            
    function view($slug = NULL){
        
        $data['berita'] = $this->blog_model->get_berita($slug);
        $data['title']  = $data['berita']['judul'];
        
        if (empty($data['berita'])):
            show_404();
        endif;
        
        $this->load->view('templates/header',$data);
        $this->load->view('blog/single',$data);
        $this->load->view('templates/footer');
    }
    
    public function tambah(){
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('judul','judul berita','required');
        $this->form_validation->set_rules('isi','isi berita','required');
        
        $data['title'] = 'tambahkan catatan blog kelas';
        
        if ($this->form_validation->run() === FALSE):
            $this->load->view('templates/header',$data);
            $this->load->view('blog/tambah',$data);
            $this->load->view('templates/footer');
        else:
            $this->blog_model->tambah_berita();
            redirect('blog');
        endif;
        
    }
    
    public function edit($id){
        
        if (empty($id)){
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('judul','judul berita','required');
        $this->form_validation->set_rules('isi','isi berita','required');
        
        $data['title'] = 'edit catatan blog kelas';
        $data['berita'] = $this->blog_model->get_berita_id($id);
        
        if ($this->form_validation->run() === FALSE):
            $this->load->view('templates/header',$data);
            $this->load->view('blog/edit',$data);
            $this->load->view('templates/footer');
        else:
            $this->berita_model->edit_berita($id);
            redirect('blog');
        endif;
        
    }
    
    public function hapus($id){
        
        if (empty($id)):
            show_404();
        endif;
        
        $this->blog_model->hapus_berita($id);
        redirect('blog');
    }
    
    
}
