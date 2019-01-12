<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Login/Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// LOGIN
$route['login/authenticate'] = 'Login/Authenticate';
$route['login'] = 'Login/Index';

// LOGOUT
$route['logout'] = 'Login/Logout';

// REGISTRAR
	// DASHBOARD
	$route['registrar/dashboard'] = 'registrar/dashboard/Dashboard/Index';

	// ELEMENTARY
	$route['registrar/dept/elementary/view/(:any)'] = 'registrar/department/elementary/Elementary/View_student/$1';
	$route['registrar/dept/elementary/register_student'] = 'registrar/department/elementary/Elementary/Register_student';
	$route['registrar/dept/elementary/new'] = 'registrar/department/elementary/Elementary/New_student';
	$route['registrar/dept/elementary/get_elem_table_data'] = 'registrar/department/elementary/Elementary/Get_elem_table_data';
	$route['registrar/dept/elementary'] = 'registrar/department/elementary/Elementary/Index';

	// JUNIOR HIGH SCHOOL
	$route['registrar/dept/juniorhs/view/(:any)'] = 'registrar/department/juniorhs/Junior_high_school/View_student/$1';
	$route['registrar/dept/juniorhs/register_student'] = 'registrar/department/juniorhs/Junior_high_school/Register_student';
	$route['registrar/dept/juniorhs/new'] = 'registrar/department/juniorhs/Junior_high_school/New_student';
	$route['registrar/dept/juniorhs/get_jhs_table_data'] = 'registrar/department/juniorhs/Junior_high_school/Get_jhs_table_data';
	$route['registrar/dept/juniorhs'] = 'registrar/department/juniorhs/Junior_high_school/Index';

	// SENIOR HIGH SCHOOL
	$route['registrar/dept/shs/view/(:any)'] = 'registrar/department/seniorhs/Senior_high_school/View_student/$1';
	$route['registrar/dept/shs/register_student'] = 'registrar/department/seniorhs/Senior_high_school/Register_student';
	$route['registrar/dept/shs/new'] = 'registrar/department/seniorhs/Senior_high_school/New_student';
	$route['registrar/dept/shs/get_shs_table_data'] = 'registrar/department/seniorhs/Senior_high_school/Get_shs_table_data';
	$route['registrar/dept/shs'] = 'registrar/department/seniorhs/Senior_high_school/Index';

	// COLLEGE
	$route['registrar/dept/college/view/(:any)'] = 'registrar/department/college/College/View_student/$1';
	$route['registrar/dept/college/register_student'] = 'registrar/department/college/College/Register_student';
	$route['registrar/dept/college/new'] = 'registrar/department/college/College/New_student';
	$route['registrar/dept/college/get_col_table_data'] = 'registrar/department/college/College/Get_col_table_data';
	$route['registrar/dept/college'] = 'registrar/department/college/College/Index';