<?php 
class M_match extends MY_Model
{
	public $id_matchs;
	public $id_equipe_a;
	public $id_equipe_b;
	public $score_a;
	public $score_b;
	public $statut;
	public $id_stade;
	public $phase;

	public function get_db_table(){
		return 'matchFoot';
	}
	public function get_db_table_pk(){
		return 'id_matchs';
	}

	public function get_data()
	{
		return $this->db->select('m.*,s.*, equipe_a.libelle_equipe as equipe_a_libelle,equipe_a.logo as logo_a,
			 			equipe_b.libelle_equipe as equipe_b_libelle,,equipe_b.logo as logo_b')
			->from($this->get_db_table().' AS m')
			->join('equipe equipe_a','equipe_a.id_equipe = m.id_equipe_a','left')
			->join('equipe equipe_b','equipe_b.id_equipe = m.id_equipe_b','left')
			->join('stade s','s.id_stade = m.id_stade','left')
			->get()
			->result();
	}
	/**
	 * $id identifiant de l'equipe a supprimer
	 * cette fonction suprime tout les macth
	 * d'une equipe qui est supprimé du championat
	 */
	function delete_matchs_by_id_equipe($id)
	{
		$sql='DELETE FROM matchFoot WHERE id_equipe_a='.$id.' OR id_equipe_b='.$id;
		 $this->db
		->query($sql);
		
	}

	/**
	 * cette fonction 
	 * compte le nombre de match entre deux equipes
	 * 
	 * et retourn ce nombre
	 */
	function count_nb_match($id_a , $id_b)
	{
		$sql ='SELECT COUNT(*) as total FROM `matchFoot` WHERE (`id_equipe_a`= '.$id_a.' or `id_equipe_a`='.$id_b.') 
			and (`id_equipe_b`='.$id_b.' OR `id_equipe_b`='.$id_a.')';
		return 
			$this->db
			->query($sql)
			->result();
	}
	/**
	 * cette fonction 
	 * compte le nombre de match entre deux equipes
	 * selon les idenfiants de ses equipes et la phase comme 
	 * paramètres 
	 * et retourn ce nombre
	 */
	function ckeck($id_a , $id_b,$phase)
	{
		$sql ='SELECT * FROM `matchFoot` WHERE (`id_equipe_a`= '.$id_a.' or `id_equipe_a`='.$id_b.') 
			and (`id_equipe_b`='.$id_b.' OR `id_equipe_b`='.$id_a.') and phase='. $phase;
		return 
			$this->db
			->query($sql)
			->row();
	}
	/**
	 * retourn la totalité de buts marqués
	 * dans ce championnat
	 */
	public function som()
	{
		$this->db->select_sum('but_marque');
		return $this->db->get('classement')->result(); 
	}
	/**
	 * retourn le nombre total de Match joué
	 */
	public function max_count_all()
	{
		return  $this->db->count_all('matchFoot');
	}
}
