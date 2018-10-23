<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil', 'profil');
    }

    public function index()
    {

        $data['all_data'] = $this->profil->get_data();
        $this->load->view('sys/V_profil', $data);
    }

    public function get_record()
    {
        $args = func_get_args();
        $this->profil->id_profil = $args[0];
        $this->profil->get_record();
        echo json_encode($this->profil, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function delete()
    {
        $args = func_get_args();
        $this->profil->id_profil = $args[0];
        echo json_encode($this->profil->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function save()
    { $this->profil->hydrate($this->input->post());

        echo json_encode($this->profil->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

}
