<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['visualiser-informations'] 	= 'Cont_z_general/show_data';
$route['supprimer-une-information'] = 'Cont_z_general/delete_data';
$route['liste-agents-siment'] = 'C_test/liste_agents_simen';




/*$route['sign-in'] = 'Welcome/index';
$route['login'] = 'C_connexions/login';*/
$route['se_deconnecter'] = 'Welcome/logout';


/*
	ROUTES API PLANETE
*/

/*
$route['annee/(.+)'] 			= 'C_api/apiGet/get_annee/$1';
$route['etablissements/(.+)'] 	= 'C_api/apiGet/list_etab_ens/$1';
$route['personnel/(.+)'] 		= 'C_api/apiGet/pers_etab/$1';
$route['cycle/(.+)'] 			= 'C_api/apiGet/cycle_str/$1';
$route['planning/(.+)'] 		= 'C_api/apiGet/planning_ens/$1';
$route['classes/(.+)'] 			= 'C_api/apiGet/classe_etab/$1';

//$route['classe-eleves/(.+)'] 	= 'C_api/apiGet/classe_eleve/$1';

$route['classes-ens/(.+)'] 		= 'C_api/apiGet/classe_ens/$1';
$route['matiere-ens/(.+)'] 		= 'C_api/apiGet/classe_matiere_ens/$1';
$route['discipline-ens/(.+)'] 	= 'C_api/apiGet/discipline_ens/$1';
$route['salles-etab/(.+)'] 		= 'C_api/apiGet/salles_etab/$1';
$route['eleves-classe/(.+)'] 	= 'C_api/apiGet/eleves_classe/$1';*/


/*
	ROUTES MOBI API
*/

/*$route['mobi-eleves-classe'] 	= 'C_api_mobi/apiGet/list_eleve_classe';*/



