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

// ADMIN
	// DASHBOARD
	$route['admin/dashboard'] = 'admin/dashboard/Dashboard/Index';

	// ACCOUNT MANAGER
	$route['admin/accnt-mgr/register_account'] = 'admin/account_manager/Account_manager/Register_account';
	$route['admin/accnt-mgr/check_username'] = 'admin/account_manager/Account_manager/Check_username';
	$route['admin/accnt-mgr/new'] = 'admin/account_manager/Account_manager/New_account';
	$route['admin/accnt-mgr/get_account_roles'] = 'admin/account_manager/Account_manager/Get_account_roles';
	$route['admin/accnt-mgr/get_account_table_data'] = 'admin/account_manager/Account_manager/Get_account_table_data';
	$route['admin/accnt-mgr'] = 'admin/account_manager/Account_manager/Index';

	// FEE MANAGER
	$route['admin/fee-mgr/create_new_fee'] = 'admin/fee_manager/Fee_manager/Create_new_fee';
	$route['admin/fee-mgr/check_feecode'] = 'admin/fee_manager/Fee_manager/Check_feecode';
	$route['admin/fee-mgr/get_departments'] = 'admin/fee_manager/Fee_manager/Get_departments';
	$route['admin/fee-mgr/get_fee_table'] = 'admin/fee_manager/Fee_manager/Get_fee_table';
	$route['admin/fee-mgr'] = 'admin/fee_manager/Fee_manager/Index';

	// DISCOUNTS
	$route['admin/discounts/create_new_discount'] = 'admin/discount_manager/Discount_manager/Create_new_discount';
	$route['admin/discounts/check_disccode'] = 'admin/discount_manager/Discount_manager/Check_disccode';
	$route['admin/discounts/get_discount_table'] = 'admin/discount_manager/Discount_manager/Get_discount_table';
	$route['admin/discounts'] = 'admin/discount_manager/Discount_manager/Index';

	// ACADEMIC YEAR AND SEMESTER
	$route['admin/aysem'] = 'admin/aysem_manager/Aysem_manager/Index';

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
	$route['registrar/dept/shs/get_strand_list'] = 'registrar/department/seniorhs/Senior_high_school/Get_strand_list';
	$route['registrar/dept/shs/get_track_list'] = 'registrar/department/seniorhs/Senior_high_school/Get_track_list';
	$route['registrar/dept/shs/get_shs_table_data'] = 'registrar/department/seniorhs/Senior_high_school/Get_shs_table_data';
	$route['registrar/dept/shs'] = 'registrar/department/seniorhs/Senior_high_school/Index';

	// COLLEGE
	$route['registrar/dept/college/view/(:any)'] = 'registrar/department/college/College/View_student/$1';
	$route['registrar/dept/college/register_student'] = 'registrar/department/college/College/Register_student';
	$route['registrar/dept/college/new'] = 'registrar/department/college/College/New_student';
	$route['registrar/dept/college/get_course_years'] = 'registrar/department/college/College/Get_course_years';
	$route['registrar/dept/college/get_student_course'] = 'registrar/department/college/College/Get_student_course';
	$route['registrar/dept/college/get_col_table_data'] = 'registrar/department/college/College/Get_col_table_data';
	$route['registrar/dept/college'] = 'registrar/department/college/College/Index';

// ASSESSOR
	// DASHBOARD
	$route['assessor/dashboard'] = 'assessor/dashboard/Dashboard/Index';