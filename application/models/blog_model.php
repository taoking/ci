<?php
class Blog_model extends CI_Model{
	
	var $title   = '';
    var $content = '';
    var $date    = '';
    
	public function __construct(){
		parent::__construct();
	}
	
   function insert_entry()
    {
        $this->title   = rand(1000, 9999); //
        $this->content = 'bbb';
        $this->date    = time();

        $this->db->insert('blog', $this);
        
    }
}