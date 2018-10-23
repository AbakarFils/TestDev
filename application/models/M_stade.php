<?php

class M_stade extends MY_Model
{
    public $id_stade;
    public $libelle_stade;
  
    

    public function get_db_table(){
        return 'stade';
    }
    
    public function get_db_table_pk(){
        return 'id_stade';
    }
    public function max_count_all()
	{
		return  $this->db->count_all('stade');
	}
}