<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_equipe extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_equipe', 'equipe');
        $this->load->model('M_match', 'match');
        $this->load->model('M_classement', 'classement');
    }

    public function index()
    {

        $data['all_data'] = $this->equipe->get_data();
        $this->load->view('sys/V_equipe', $data);
    }

    public function get_record()
    {
        $args = func_get_args();
        $this->equipe->id_equipe = $args[0];
        $this->equipe->get_record();
         
        echo json_encode($this->equipe, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function delete()
    {
        $args = func_get_args();
        $this->equipe->id_equipe = $args[0];
        $this->equipe->get_record();
       
        /**
         * recuperer l'equipe ensuite supprimer
         * de la liste du classement et aussi supprimer 
         * tous ces match
         */
        $classement=  $this->classement->get_classement_by_id_equipe($args[0]);
        
        if($classement!=null)
        {
            $this->classement->id = $classement->id;

            $this->classement->get_record();
            $this->classement->delete();
        }
        /**
         * suppression du match associé à l'equipe
         */
         $this->match->delete_matchs_by_id_equipe($args[0]);

        echo json_encode($this->equipe->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    /**
    * fonction de sauvegarde 
    * d'une équipe puis 
    * initialise l'equipe dans la liste
    * de classements
    */

    public function save()
    { 
        
         if(isset($_FILES['image']) && $_FILES['image']['size'] != 0 ) //s'assurer que le logo est renseigner
         {
          
            $errors= array();
            $file_size =$_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            
            $tmp = explode('.', $_FILES['image']['name']);
            $file_ext = end($tmp);
            
            $expensions= array("jpeg","jpg","png","JPEG","JPG","PNG");
            // s'assurer que le user a spécifier une image ayant comme extensions ci dessu
            if(in_array($file_ext,$expensions)=== false){
                $errors['message']="Extension non autorisée, veuillez choisir un fichier jpg, jpeg ou png.";
            }
            else if($file_size > 300000)
            {
                $errors['message']= "La taille du fichier ne doit pas excédée 300000 bit";
            }

            if(empty($errors)==true) // tout est ok
            {
               $ob =$this->equipe->max_id() ;
               $id=($ob[0]->total)+1;
                
                $new_filename =  rand(1,1000).'image_'.$id.'.'.$file_ext;
                move_uploaded_file($file_tmp, "./images/".$new_filename); //personnalise le nom de l image
                
                if ($this->input->post('id_equipe')!='') 
                    $this->equipe->id_equipe=$this->input->post('id_equipe');
                else
                     $this->equipe->id_equipe=null;

                $this->equipe->logo = $new_filename;
                $this->equipe->libelle_equipe = $this->input->post('libelle_equipe');
                $this->equipe->description_equipe = $this->input->post('description_equipe');

                $result=$this->equipe->save();
                /**
                 *  initialisation et positionnement de l'equipe 
                 * dans le classement
                 */
                if($result['status'] == 'success') 
                {
                    if ($this->input->post('id_equipe')!='') 
                       $id =$this->input->post('id_equipe');
                    else
                         $id = $result['id'];
                     
                    $this->classement->id=null;
                    $this->classement->id_equipe=$id;
                    $this->classement->Match_joue=0;
                    $this->classement->but_marque=0;
                    $this->classement->pts=0;
                    $this->classement->nulls=0;
                    $this->classement->victoire=0;
                    $this->classement->defaite=0;
                    $this->classement->difference_but=0;
                    $this->classement->but_encaise=0;
                    $result=$this->classement->save();
                }
                

            }
            else
            {
                $result['status'] = 'error';
                $result['message'] = $errors['message'];
            }

        }
        else
        {
            $result['status'] = 'error';
            $result['message'] = $errors['message'];
        }  
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

}
