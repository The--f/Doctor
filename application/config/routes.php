<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
// $route['URL'] = "controller name"

$route ['admin/calander/(:num)/(:num)'] = 'backoffice_control/calander/$1/$2';
$route ['admin/calander'] = 'backoffice_control/calander/0/0';
$route ['admin/(:any)'] = 'backoffice_control/$1';
$route ['admin'] = 'backoffice_control';
$route ['reservations'] = 'main_control/reservations';
$route ['insert'] = 'TestInsert';
$route ['login'] = 'main_control/login';
$route ['logout'] = 'main_control/logout';
//$route ['view_cal'] = 'Calander/view_calander/$1/$2';
//$route ['view_cal'] = 'Calander/view_calander/0/0';
//$route ['autocomplete/suggestions'] = 'Autocomplete/suggestions';
$route ['calander/(:num)/(:num)'] = 'Calander/view_calander/$1/$2';
$route ['calander'] = 'Calander/view_calander/0/0';
$route ['calander/day/(:num)/(:num)/(:num)'] = 'Calander/view_day/$1/$2/$3';
$route ['list'] = 'TestList/patients';
$route ['reserv'] = 'Reservation';
/* /add_reserv/year/month/day   */
$route['add_reserv'] = 'add_reserv/add';
$route['default_controller'] = 'main_control';
$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */