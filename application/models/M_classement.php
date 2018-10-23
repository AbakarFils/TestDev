<?php 
/**
 * classe qui mappe la table classe de 
 * la base de donnné
 */
class M_classement extends MY_Model
{
	public $id;
	public $id_equipe;
	public $pts;
	public $nulls;
	public $Match_joue;
	public $victoire;
	public $defaite;
	public $but_marque;
	public $but_encaise;
	public $difference_but;

	public function get_db_table(){
		return 'classement';
	}

	public function get_db_table_pk(){
		return 'id';
	}
	/**
	 * $id_equipe répresente l identifiant d'une equipe
	 * get_classement_by_id_equipe retourn la ligne contenant 
	 * le rang de cette equipe dans la table classement
	 */
	public function get_classement_by_id_equipe($id_equipe)
	{
		return $this->db->select('clas.*')
						->from($this->get_db_table().' AS clas')
						->where('clas.id_equipe', $id_equipe)
						->get()
						->row();
	}
	/**
	 * retourn l'ensemble de statisque de chaque equipe
	 * ordonner par :
	 * point , match joue ,difference de buts etc
	 * permettant ainsi gerer automatiquement l'ordre du classement
	 * entre les equipes
	 */
	public function get_data()
	{
		return $this->db->select('clas.*,e.*')
						->from($this->get_db_table().' AS clas')
						->join('equipe e','e.id_equipe = clas.id_equipe','left')
						->order_by('clas.pts DESC')
						->order_by('clas.Match_joue ')
						->order_by('clas.difference_but DESC')
						->order_by('clas.but_marque DESC')
						->order_by('clas.nulls')
						->order_by('clas.defaite')
						->get()
						->result();
	}
}
