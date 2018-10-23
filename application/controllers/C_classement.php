<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_classement extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil', 'profil');
        $this->load->model('M_classement', 'classement');
    }
    /**
     * rend la liste des classement deja ordonnée à travers la 
     * methode du model M_classement (get_data)
     */
    public function index()
    {
        
        $data['all_data']  = $this->classement->get_data();
        $this->load->view('sys/V_classement', $data);
    }


}
