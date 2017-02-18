<?php



/**
 * Description of Berita_model
 *
 * @author User
 */
class Blog_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_berita($slug = FALSE){
        
        if ($slug === FALSE):
            $this->db->from('berita');
            $this->db->order_by('waktu','DESC');
            $query = $this->db->get();
            return $query->result_array();
        endif;
        
        $query = $this->db->get_where('berita',array('slug' => $slug));
        return $query->row_array();
        
    }
    
    public function get_berita_id($id){
        $query = $this->db->get_where('berita',array('id' => $id));
        return $query->row_array();
    }
    
    public function tambah_berita(){
        
        $this->load->helper('url');
        
        $slug = url_title($this->input->post('judul'), 'dash',true);
        $editor = $this->session->userdata('username');
        
        $data = array(
          'judul' => $this->input->post('judul'),
          'isi' => $this->input->post('isi'),
          'slug' => $slug,
          'editor' => $editor
        );
        
        return $this->db->insert('berita',$data);
    }
    
    public function edit_berita($id){
        
        $this->load->helper('url');
        
        $slug = url_title($this->input->post('judul'), 'dash',true);
        $judul = $this->input->post('judul');
        $isi   = $this->input->post('isi');
        $editor = $this->session->userdata('username');
        
        $query = "UPDATE berita SET judul = '$judul', isi = '$isi',slug = '$slug',editor = '$editor', waktu = CURRENT_TIME() WHERE id = $id ";
        
        return $this->db->query($query);
    }
    
    public function hapus_berita($id){
        
        $this->db->where('id',$id);
        return $this->db->delete('berita');
        
    }
    
}
