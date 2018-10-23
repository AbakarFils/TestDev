<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil', 'profil');
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        $data_profil = $this->profil->get_data();
        $data['data_profil_select'] = create_select_list($data_profil, 'id_profil', 'libelle_profil');

        $data['all_data'] = $this->user->get_data();
        $this->load->view('sys/V_user', $data);
    }

    public function get_record()
    {
        $args = func_get_args();
        $this->user->id_user = $args[0];
        $this->user->get_record();
        echo json_encode($this->user, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function delete()
    {
        $args = func_get_args();
        $this->user->id_user = $args[0];
        echo json_encode($this->user->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function save()
    {
        if ($this->input->post('id_user') != '')
            $this->user->id_user = $this->input->post('id_user');

        $this->user->nom = $this->input->post('nom');
        $this->user->prenom = $this->input->post('prenom');
        $this->user->sexe = $this->input->post('sexe');
        $this->user->adresse = $this->input->post('adresse');
        $this->user->telephone = $this->input->post('telephone');
        $this->user->email = $this->input->post('email');
        $this->user->login = $this->input->post('login');
        $this->user->password = $this->input->post('password');
        $this->user->id_profil = $this->input->post('id_profil');
        $this->user->statut = $this->input->post('statut');
        //$this->user->date_last_modif = $this->input->post('date_last_modif');

        echo json_encode($this->user->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

}
