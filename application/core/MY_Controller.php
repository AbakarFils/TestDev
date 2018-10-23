<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->user) || $this->session->user == null || $this->session->logged_in != true)
		{
			$this->session->sess_destroy();
			header("Location:".site_url());
		}
		else
		{
			return true;
		}

	}

}

