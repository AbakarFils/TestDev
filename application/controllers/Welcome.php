<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * la porte d'entrée du site
 */
class Welcome extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->model('M_stade', 'stade');
        $this->load->model('M_equipe', 'equipe');
        $this->load->model('M_match', 'match');
    }
    
    /**
     * fonction permettant de donner acces à l'application
     */
    public function index()
    {

        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = $this->user->resolve_user_login($this->input->post('username'), $this->input->post('password'));
            if (!empty($user) && $user->id_user != '' && $user->id_user != NULL && ($user->statut == 'attente' || $user->statut == 'actif'))
            {
                //garder dans la session le status de la connection et le user 
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('user', $user);

                if($user->statut == 'attente')
                {
                    $this->user->id_user = $user->id_user;
                    $this->user->statut = 'actif';
                    $this->user->save($without_null = true);
                }

                header("Location:".site_url());

            }
            else
            {
                $data['msg_error'] = 'Indetifiant ou mot de passe incorrect !';
                $this->load->view('sys/V_login', $data);
            }

        } //deconnecter le user si l'une des condition est verifiée
        else if (!isset($this->session->user) || $this->session->user == null || $this->session->logged_in != true)
        {
            $this->session->sess_destroy();
            $this->load->view('sys/V_login');
        }
        else // connecter le user
        {
            $data['user'] = $this->session->user;
            $data['max_count_all'] =$this->equipe->max_count_all();
            $a=$data['max_count_all_matchs'] =$this->match->max_count_all();
            if($a!=0)
            {
                $data['moyenne'] =$this->match->som()[0];
            }
            else
            {
                $data['moyenne'] =0; 
            }
            $data['stades'] =$this->stade->max_count_all();; 
            $this->load->view('sys/V_dashboard', $data);
        }

    }



    //logout
    public function logout()
    {
        $this->session->sess_destroy();
        header("Location:".site_url());
    }


}
