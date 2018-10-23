<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_match extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_match', 'match');
        $this->load->model('M_equipe', 'equipe');
        $this->load->model('M_stade', 'stade');
        $this->load->model('M_classement', 'classement');
    }
    

    public function index()
    {

        $data['all_data'] = $this->match->get_data();
        $data['data_equipe_select']  = $this->equipe->get_data(); 
        
        $data_stade=$this->stade->get_data();
        $data['data_stade_select'] = create_select_list($data_stade, 'id_stade', 'libelle_stade');
        $this->load->view('sys/V_match', $data);
    }

    public function get_record()
    {
        $args = func_get_args();
        $this->match->id_matchs = $args[0];
        $this->match->get_record();
        echo json_encode($this->match, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    /**
     * supprime un match c'est à dire permet d'annuler un match
     * ensuite remet le calssement à jour
     */
    public function delete()
    {
        $args = func_get_args();
        $this->match->id_matchs = $args[0];
        $this->match->get_record();
        /**
         * dès qu'on recupère le match
         * à supprimer on cherches les equipes 
         * participantes et on met à jour leur statisques dans 
         * le classement général
         */
        if($this->match!=null)
        {
            $id_equipe_a = $this->match->id_equipe_a;
            // equipe a 
            $cl=$this->classement->get_classement_by_id_equipe($id_equipe_a);
            
            $this->classement->id = $cl->id;

            $this->classement->get_record();

            $this->classement->id_equipe=$this->match->id_equipe_a;
            $this->classement->Match_joue-=1;
            $this->classement->but_marque-= $this->match->score_a;
            $this->classement->but_encaise-= $this->match->score_b;
            $this->classement->difference_but=($this->classement->but_marque -$this->classement->but_encaise);
            //cas de la victoire
            if($this->match->score_a > $this->match->score_b)
            {
                $this->classement->victoire -=1;
                $this->classement->pts-= 3;
            }
            else if($this->match->score_a==$this->match->score_b) //null
            {
                $this->classement->nulls -=1;
                $this->classement->pts-= 1;
            }
            else //defaite
            {
                $this->classement->defaite -=1;
            }

            $equipe_save =$this->classement->save();
            
            if ( $equipe_save['status'] == 'success')
            {
                $id_equipe_b = $this->match->id_equipe_b;

                $cl=$this->classement->get_classement_by_id_equipe($id_equipe_b);
                
                $this->classement->id = $cl->id;

                $this->classement->get_record();

                $this->classement->id_equipe=$this->match->id_equipe_b;
                $this->classement->Match_joue-=1;
                $this->classement->but_marque-= $this->match->score_b;
                $this->classement->but_encaise-= $this->match->score_a;
                $this->classement->difference_but=($this->classement->but_marque -$this->classement->but_encaise);
                //cas de la victoire
                if($this->match->score_b > $this->match->score_a)
                {
                    $this->classement->victoire -=1;
                    $this->classement->pts-= 3;
                }
                else if($this->match->score_b==$this->match->score_a) //null
                {
                    $this->classement->nulls -=1;
                    $this->classement->pts-= 1;
                }
                else //defaite
                {
                    $this->classement->defaite -=1;
                }
               $result= $this->classement->save();
              
            }
            
        }
        if( $result['status']==='success')
        {
            $result=$this->match->delete(); 
        }
        else
        {
            $result['message'] = "erreurs d'annulation et de mis à jour du classement";
            $result['status'] = 'error';
        }
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }
    /**
     * verifie si les deux equipes ont deja
     * joue 2 fois (aller & retour)
     * ensuite sauvegarde le match
     * enfin met à jour le classement 
     */
    public function save()
    { 
        
        
        $a=$this->input->post('id_equipe_a');
        $b=$this->input->post('id_equipe_b');
        $verification_match =$this->match->count_nb_match($a,$b);
       
        //on verifie si les deux épuipes ont deja jouer deux matchs (aller & retour)
        if($verification_match[0]->total == 2)
        {
            $result['message'] = "Les deux equipes ne doivent pas avoir au délà de 2 match";
            $result['status'] = 'error';
        }
        else if($verification_match[0]->total==1 && $this->input->post('phase')==1 ) //on verifie si les deux épuipes ont juste ont eu 1 matchs (aller simple)
        {
             // et s'assurer aussi qu'il n'a pas spécifier encore aller
            {
                $result['message'] = "Veillez spécifiez que c'est un Match Retour";
                $result['status'] = 'error';
            }
        }
        else
        {
                if ($this->input->post('id_matchs') != '')
                    $this->match->id_matchs = $this->input->post('id_matchs');
                else
                    $this->match->id_matchs =null;

                $this->match->code = $this->input->post('code');
                $this->match->id_equipe_a = $this->input->post('id_equipe_a');
                $this->match->score_a = $this->input->post('score_a');
                $this->match->id_journe = $this->input->post('id_journe');
                $this->match->id_stade = $this->input->post('id_stade');
                $this->match->id_equipe_b = $this->input->post('id_equipe_b');
                $this->match->score_b = $this->input->post('score_b');
                $this->match->phase = $this->input->post('phase');
                $this->match->statut = $this->input->post('statut');

                $result = $this->match->save();
                
                /**
                * si le match est bien sauvegarder 
                * il faut mettre a jour le statistique(vict,null) de chaque
                * equipe(a et b )
                *
                */

                if($result['status'] == 'success')
                {
                    //cas de l'equipe a
                    $id_equipe_a = $this->input->post('id_equipe_a');

                    $cl=$this->classement->get_classement_by_id_equipe($id_equipe_a);
                    
                    $this->classement->id = $cl->id;

                    $this->classement->get_record();

                    $this->classement->id_equipe=$this->input->post('id_equipe_a');
                    $this->classement->Match_joue+=1;
                    $this->classement->but_marque+=$this->input->post('score_a');
                    $this->classement->but_encaise+=$this->input->post('score_b');
                    $this->classement->difference_but=($this->classement->but_marque -$this->classement->but_encaise);
                    //cas de la victoire
                    if($this->input->post('score_a') > $this->input->post('score_b'))
                    {
                        $this->classement->victoire +=1;
                        $this->classement->pts+= 3;
                    }
                    else if($this->input->post('score_a')==$this->input->post('score_b')) //null
                    {
                        $this->classement->nulls +=1;
                        $this->classement->pts+= 1;
                    }
                    else //defaite
                    {
                        $this->classement->defaite +=1;
                    }

                    $equipe_save =$this->classement->save();

                    if ( $equipe_save['status'] == 'success') 
                    {
                        // cas de l'equipe b
                        $id_equipe_b = $this->input->post('id_equipe_b');

                        $equipe=$this->classement->get_classement_by_id_equipe($id_equipe_b);
                        
                        $this->classement->id = $equipe->id;
                        $this->classement->get_record();

                        $this->classement->id_equipe=$this->input->post('id_equipe_b');
                        $this->classement->Match_joue+=1;
                        $this->classement->but_marque+=$this->input->post('score_b');
                        $this->classement->but_encaise+=$this->input->post('score_a');
                        $this->classement->difference_but= ($this->classement->but_marque - $this->classement->but_encaise);
                        //cas de la victoire
                        if($this->input->post('score_b') > $this->input->post('score_a'))
                        {
                            $this->classement->victoire +=1;
                            $this->classement->pts+=3;
                        }
                        else if($this->input->post('score_b')==$this->input->post('score_a')) //null
                        {
                            $this->classement->nulls +=1;
                            $this->classement->pts+= 1;
                        }
                        else //defaite
                        {
                            $this->classement->defaite +=1;
                        }
                        $this->classement->save();
                    }
                    
                }

        }
        
    echo json_encode( $result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |JSON_HEX_AMP);
    }

}
