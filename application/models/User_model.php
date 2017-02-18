<?php


/**
 * Description of User_model
 *
 * @author bsujtamiko.github.io
 */

class User_model extends CI_Model{
    
    function __construct() 
    {
        $this->load->database();
    }
    
    public function get_user($username = FALSE)
    {
       
        if ($username === FALSE):
            $this->db->from('user');
            $this->db->order_by('iduser','DESC');
            $query = $this->db->get();
            return $query->result_array();
        endif;
        
        $query = $this->db->get_where('user',  array('username' => $username));
        return $query->row_array();
    }
    
    
    
    public function validate_data($user)
    {
        return $this->db->get_where('user',$user);
    }
    
    
    public function register_data()
    {
        $slug = url_title($this->input->post('nama'),'dash',true);
        $pass = $this->input->post('pass');
        
        $dataUser = array(
          'nim' => $this->input->post('nim'),
            'username' => $this->input->post('username'),
            'pass' => md5($pass),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'birthday' => $this->input->post('birthday'),
            'slug' => $slug
        );
        
        return $this->db->insert('user',$dataUser);
    }
}
