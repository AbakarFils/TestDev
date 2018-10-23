<?php 
class M_equipe extends MY_Model
{
	public $id_equipe;
	public $libelle_equipe;
	public $description_equipe;
	public $logo;
	public function get_db_table(){
		return 'equipe';
	}
	public function get_db_table_pk(){
		return 'id_equipe';
	}
	public function max_id(){
	return $this->db->select_max('id_equipe ','total')
				->from('equipe')
				->get()
				->result();
	}
	// retourn le nbre d'equipe dans la BD
	public function max_count_all()
	{
		return  $this->db->count_all('equipe');
	}
}
