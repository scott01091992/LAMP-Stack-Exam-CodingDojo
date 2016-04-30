<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "exam/main";

$route['logout'] = "exam/logout";

$route['travels'] = "exam/home";

$route['travels/destination/(:any)'] = "exam/destination/$1";

$route['destination/(:any)'] = "exam/destination/$1";

//joining a plan
$route['join/(:any)'] = "exam/join/$1";

//travel plan add page
$route['travels/add'] = "exam/travels_add";

//travel plan form submitted
$route['add_travel_plan'] = "exam/add_travel_plan";

$route['404_override'] = '';

//login form submitted
$route['login'] = "exam/login";

//register form submitted
$route['register'] = "exam/register";


/* End of file routes.php */
/* Location: ./application/config/routes.php */