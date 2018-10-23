<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_stade extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stade', 'stade');
    }

    public function index()
    {

        $data['all_data'] = $this->stade->get_data();
        $this->load->view('sys/V_stade', $data);
    }

    public function get_record()
    {
        $args = func_get_args();
        $this->stade->id_stade = $args[0];
        $this->stade->get_record();
        echo json_encode($this->stade, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function delete()
    {
        $args = func_get_args();
        $this->stade->id_stade = $args[0];
        echo json_encode($this->stade->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function save()
    { $this->stade->hydrate($this->input->post());

        echo json_encode($this->stade->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

}
