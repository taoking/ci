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
        $this->title   = time(); //
        $this->content = 'bbb';
        $this->date    = 'cc';

        $this->db->insert('blog', $this);
        
    }
}