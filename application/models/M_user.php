<?php 
class M_user extends MY_Model
{
	public $id_user;
	public $nom;
	public $prenom;
	public $sexe;
	public $adresse;
	public $telephone;
	public $email;
	public $login;
	public $password;
	public $id_profil;
	public $statut;
	public $date_last_modif;

	/**
	 * permet de verifie si ce login et mot de 
	 * passe sont bien renseigner dans la 
	 * BD
	 * si oui retour le User correspondant
	 * si non null
	 */
	public function resolve_user_login($login, $password)
	{
		return $this->db->select('u.*, p.libelle_profil')
						->from($this->get_db_table().' AS u')
						->join('sys_profil p','p.id_profil=u.id_profil','left')
						->where('u.login', $login)
						->where('u.password', $password)
						->get()
						->row();
	}

	public function get_data()
	{
		return $this->db->select('u.*, p.libelle_profil')
			->from($this->get_db_table().' AS u')
			->join('sys_profil p','p.id_profil=u.id_profil','left')
			->get()
			->result();
	}


	public function get_db_table(){
		return 'sys_user';
	}
	public function get_db_table_pk(){
		return 'id_user';
	}

}