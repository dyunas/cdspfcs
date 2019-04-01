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
	$route['admin/dashboard/get_yearly_student_total'] = 'admin/dashboard/Dashboard/Get_yearly_student_total';
	$route['admin/dashboard/get_student_distribution'] = 'admin/dashboard/Dashboard/Get_student_distribution';
	$route['admin/dashboard'] = 'admin/dashboard/Dashboard/Index';

	// ELEMENTARY
	$route['admin/dept/kinder/view/process_payment'] = 'admin/department/kinder/Kinder/Process_payment';
	$route['admin/dept/kinder/view/get_payables_info'] = 'admin/department/kinder/Kinder/Get_payables_info';
	$route['admin/dept/kinder/view/check_fee_row'] = 'admin/department/kinder/Kinder/Check_fee_row';
	$route['admin/dept/kinder/view/get_assessment_info'] = 'admin/department/kinder/Kinder/Get_assessment_info';
	$route['admin/dept/kinder/view/add_assessment'] = 'admin/department/kinder/Kinder/Add_assessment';
	$route['admin/dept/kinder/view/get_tuition_fee'] = 'admin/department/kinder/Kinder/Get_tuition_fee';
	$route['admin/dept/kinder/view/get_discount_amount'] = 'admin/department/kinder/Kinder/Get_discount_amount';
	$route['admin/dept/kinder/view/(:any)'] = 'admin/department/kinder/Kinder/View_student/$1';
	$route['admin/dept/kinder/get_payment_history'] = 'admin/department/kinder/Kinder/Get_payment_history';
	$route['admin/dept/kinder/get_kinder_table_data'] = 'registrar/department/kinder/Kinder/Get_kinder_table_data';
	$route['admin/dept/kinder'] = 'admin/department/kinder/Kinder/Index';

	// ELEMENTARY
	$route['admin/dept/elementary/view/process_payment'] = 'admin/department/elementary/Elementary/Process_payment';
	$route['admin/dept/elementary/view/get_payables_info'] = 'admin/department/elementary/Elementary/Get_payables_info';
	$route['admin/dept/elementary/view/check_fee_row'] = 'admin/department/elementary/Elementary/Check_fee_row';
	$route['admin/dept/elementary/view/get_assessment_info'] = 'admin/department/elementary/Elementary/Get_assessment_info';
	$route['admin/dept/elementary/view/add_assessment'] = 'admin/department/elementary/Elementary/Add_assessment';
	$route['admin/dept/elementary/view/get_tuition_fee'] = 'admin/department/elementary/Elementary/Get_tuition_fee';
	$route['admin/dept/elementary/view/get_discount_amount'] = 'admin/department/elementary/Elementary/Get_discount_amount';
	$route['admin/dept/elementary/view/(:any)'] = 'admin/department/elementary/Elementary/View_student/$1';
	$route['admin/dept/elementary/get_payment_history'] = 'admin/department/elementary/Elementary/Get_payment_history';
	$route['admin/dept/elementary/get_elem_table_data'] = 'registrar/department/elementary/Elementary/Get_elem_table_data';
	$route['admin/dept/elementary'] = 'admin/department/elementary/Elementary/Index';

	// JUNIORHS
	$route['admin/dept/juniorhs/view/process_payment'] = 'admin/department/juniorhs/Junior_high_school/Process_payment';
	$route['admin/dept/juniorhs/view/get_payables_info'] = 'admin/department/juniorhs/Junior_high_school/Get_payables_info';
	$route['admin/dept/juniorhs/view/check_fee_row'] = 'admin/department/juniorhs/Junior_high_school/Check_fee_row';
	$route['admin/dept/juniorhs/view/get_assessment_info'] = 'admin/department/juniorhs/Junior_high_school/Get_assessment_info';
	$route['admin/dept/juniorhs/view/add_assessment'] = 'admin/department/juniorhs/Junior_high_school/Add_assessment';
	$route['admin/dept/juniorhs/view/get_tuition_fee'] = 'admin/department/juniorhs/Junior_high_school/Get_tuition_fee';
	$route['admin/dept/juniorhs/view/get_discount_amount'] = 'admin/department/juniorhs/Junior_high_school/Get_discount_amount';
	$route['admin/dept/juniorhs/view/(:any)'] = 'admin/department/juniorhs/Junior_high_school/View_student/$1';
	$route['admin/dept/juniorhs/get_payment_history'] = 'admin/department/juniorhs/Junior_high_school/Get_payment_history';
	$route['admin/dept/juniorhs/get_jhs_table_data'] = 'registrar/department/juniorhs/Junior_high_school/Get_jhs_table_data';
	$route['admin/dept/juniorhs'] = 'admin/department/juniorhs/Junior_high_school/Index';

	// SENIORHIGH
	$route['admin/dept/shs/view/process_payment'] = 'admin/department/seniorhigh/Senior_high_school/Process_payment';
	$route['admin/dept/shs/view/get_payables_info'] = 'admin/department/seniorhigh/Senior_high_school/Get_payables_info';
	$route['admin/dept/shs/view/check_fee_row'] = 'admin/department/seniorhigh/Senior_high_school/Check_fee_row';
	$route['admin/dept/shs/view/get_assessment_info'] = 'admin/department/seniorhigh/Senior_high_school/Get_assessment_info';
	$route['admin/dept/shs/view/add_assessment'] = 'admin/department/seniorhigh/Senior_high_school/Add_assessment';
	$route['admin/dept/shs/view/get_tuition_fee'] = 'admin/department/seniorhigh/Senior_high_school/Get_tuition_fee';
	$route['admin/dept/shs/view/get_discount_amount'] = 'admin/department/seniorhigh/Senior_high_school/Get_discount_amount';
	$route['admin/dept/shs/view/(:any)'] = 'admin/department/seniorhigh/Senior_high_school/View_student/$1';
	$route['admin/dept/shs/get_payment_history'] = 'admin/department/seniorhigh/Senior_high_school/Get_payment_history';
	$route['admin/dept/shs/get_shs_table_data'] = 'registrar/department/seniorhs/Senior_high_school/Get_shs_table_data';
	$route['admin/dept/shs'] = 'admin/department/seniorhigh/Senior_high_school/Index';

	// COLLEGE
	$route['admin/dept/college/view/process_payment'] = 'admin/department/college/College/Process_payment';
	$route['admin/dept/college/view/get_payables_info'] = 'admin/department/college/College/Get_payables_info';
	$route['admin/dept/college/view/check_fee_row'] = 'admin/department/college/College/Check_fee_row';
	$route['admin/dept/college/view/get_assessment_info'] = 'admin/department/college/College/Get_assessment_info';
	$route['admin/dept/college/view/add_assessment'] = 'admin/department/college/College/Add_assessment';
	$route['admin/dept/college/view/get_discount_amount'] = 'admin/department/college/College/Get_discount_amount';
	$route['admin/dept/college/view/get_thesis_fee'] = 'admin/department/college/College/Get_thesis_fee';
	$route['admin/dept/college/view/get_tuition_fee'] = 'admin/department/college/College/Get_tuition_fee';
	$route['admin/dept/college/view/(:any)'] = 'admin/department/college/College/View_student/$1';
	$route['admin/dept/college/get_payment_history'] = 'admin/department/college/College/Get_payment_history';
	$route['admin/dept/college/get_col_table_data'] = 'admin/department/college/College/Get_col_table_data';
	$route['admin/dept/college'] = 'admin/department/college/College/Index';

	// ACCOUNT MANAGER
	$route['admin/accnt-mgr/register_account'] = 'admin/account_manager/Account_manager/Register_account';
	$route['admin/accnt-mgr/check_username'] = 'admin/account_manager/Account_manager/Check_username';
	$route['admin/accnt-mgr/new'] = 'admin/account_manager/Account_manager/New_account';
	$route['admin/accnt-mgr/get_account_roles'] = 'admin/account_manager/Account_manager/Get_account_roles';
	$route['admin/accnt-mgr/get_account_table_data'] = 'admin/account_manager/Account_manager/Get_account_table_data';
	$route['admin/accnt-mgr'] = 'admin/account_manager/Account_manager/Index';

	// FEE MANAGER
	$route['admin/fee-mgr/update_fee'] = 'admin/fee_manager/Fee_manager/Update_fee';
	$route['admin/fee-mgr/create_new_fee'] = 'admin/fee_manager/Fee_manager/Create_new_fee';
	$route['admin/fee-mgr/check_feecode'] = 'admin/fee_manager/Fee_manager/Check_feecode';
	$route['admin/fee-mgr/get_grade_levels'] = 'admin/fee_manager/Fee_manager/Get_grade_levels';
	$route['admin/fee-mgr/get_fee_table'] = 'admin/fee_manager/Fee_manager/Get_fee_table';
	$route['admin/fee-mgr'] = 'admin/fee_manager/Fee_manager/Index';

	// DISCOUNTS
	$route['admin/discounts/create_new_discount'] = 'admin/discount_manager/Discount_manager/Create_new_discount';
	$route['admin/discounts/check_disccode'] = 'admin/discount_manager/Discount_manager/Check_disccode';
	$route['admin/discounts/get_departments'] = 'admin/discount_manager/Discount_manager/Get_departments';
	$route['admin/discounts/get_discount_table'] = 'admin/discount_manager/Discount_manager/Get_discount_table';
	$route['admin/discounts'] = 'admin/discount_manager/Discount_manager/Index';

	// ACADEMIC YEAR AND SEMESTER
	$route['admin/aysem/update_semester'] = 'admin/aysem_manager/Aysem_manager/Update_semester';
	$route['admin/aysem/update_acadyear'] = 'admin/aysem_manager/Aysem_manager/Update_acadyear';
	$route['admin/aysem'] = 'admin/aysem_manager/Aysem_manager/Index';

	// REPORTS - STATEMENT OF ACCOUNTS
	$route['admin/reports/create_statement'] = 'admin/reports/soa/Statement_accounts/Create_statement';
	$route['admin/reports/soa'] = 'admin/reports/soa/Statement_accounts/Index';

	// REPORTS - DAILY COLLECTION REPORT
	$route['admin/reports/get_daily_collection'] = 'admin/reports/daily/Daily_collection/Get_daily_collection';
	$route['admin/reports/daily'] = 'admin/reports/daily/Daily_collection/Index';

// REGISTRAR
	// DASHBOARD
	$route['registrar/dashboard/get_yearly_student_total'] = 'registrar/dashboard/Dashboard/Get_yearly_student_total';
	$route['registrar/dashboard/get_student_distribution'] = 'registrar/dashboard/Dashboard/Get_student_distribution';
	$route['registrar/dashboard'] = 'registrar/dashboard/Dashboard/Index';

	// ELEMENTARY
	$route['registrar/dept/kinder/view/upload_avatar'] = 'registrar/department/kinder/Kinder/Upload_avatar';
	$route['registrar/dept/kinder/view/check_fee_row'] = 'registrar/department/kinder/Kinder/Check_fee_row';
	$route['registrar/dept/kinder/view/get_assessment_info'] = 'registrar/department/kinder/Kinder/Get_assessment_info';
	$route['registrar/dept/kinder/edit/(:any)'] = 'registrar/department/kinder/Kinder/Edit_student/$1';
	$route['registrar/dept/kinder/view/(:any)'] = 'registrar/department/kinder/Kinder/View_student/$1';
	$route['registrar/dept/kinder/update_student_admission_status'] = 'registrar/department/kinder/Kinder/Update_student_admission_status';
	$route['registrar/dept/kinder/update_student'] = 'registrar/department/kinder/Kinder/Update_student';
	$route['registrar/dept/kinder/register_student'] = 'registrar/department/kinder/Kinder/Register_student';
	$route['registrar/dept/kinder/new'] = 'registrar/department/kinder/Kinder/New_student';
	$route['registrar/dept/kinder/check_stud_lrn'] = 'registrar/department/kinder/Kinder/Check_lrn';
	$route['registrar/dept/kinder/get_payment_history'] = 'registrar/department/kinder/Kinder/Get_payment_history';
	$route['registrar/dept/kinder/get_kinder_table_data'] = 'registrar/department/kinder/Kinder/Get_kinder_table_data';
	$route['registrar/dept/kinder'] = 'registrar/department/kinder/Kinder/Index';

	// ELEMENTARY
	$route['registrar/dept/elementary/view/upload_avatar'] = 'registrar/department/elementary/Elementary/Upload_avatar';
	$route['registrar/dept/elementary/view/check_fee_row'] = 'registrar/department/elementary/Elementary/Check_fee_row';
	$route['registrar/dept/elementary/view/get_assessment_info'] = 'registrar/department/elementary/Elementary/Get_assessment_info';
	$route['registrar/dept/elementary/edit/(:any)'] = 'registrar/department/elementary/Elementary/Edit_student/$1';
	$route['registrar/dept/elementary/view/(:any)'] = 'registrar/department/elementary/Elementary/View_student/$1';
	$route['registrar/dept/elementary/update_student_admission_status'] = 'registrar/department/elementary/Elementary/Update_student_admission_status';
	$route['registrar/dept/elementary/update_student'] = 'registrar/department/elementary/Elementary/Update_student';
	$route['registrar/dept/elementary/register_student'] = 'registrar/department/elementary/Elementary/Register_student';
	$route['registrar/dept/elementary/new'] = 'registrar/department/elementary/Elementary/New_student';
	$route['registrar/dept/elementary/check_stud_lrn'] = 'registrar/department/elementary/Elementary/Check_lrn';
	$route['registrar/dept/elementary/get_payment_history'] = 'registrar/department/elementary/Elementary/Get_payment_history';
	$route['registrar/dept/elementary/get_elem_table_data'] = 'registrar/department/elementary/Elementary/Get_elem_table_data';
	$route['registrar/dept/elementary'] = 'registrar/department/elementary/Elementary/Index';

	// JUNIOR HIGH SCHOOL
	$route['registrar/dept/juniorhs/view/upload_avatar'] = 'registrar/department/juniorhs/Junior_high_school/Upload_avatar';
	$route['registrar/dept/juniorhs/view/check_fee_row'] = 'registrar/department/juniorhs/Junior_high_school/Check_fee_row';
	$route['registrar/dept/juniorhs/view/get_assessment_info'] = 'registrar/department/juniorhs/Junior_high_school/Get_assessment_info';
	$route['registrar/dept/juniorhs/edit/(:any)'] = 'registrar/department/juniorhs/Junior_high_school/Edit_student/$1';
	$route['registrar/dept/juniorhs/view/(:any)'] = 'registrar/department/juniorhs/Junior_high_school/View_student/$1';
	$route['registrar/dept/juniorhs/update_student_admission_status'] = 'registrar/department/juniorhs/Junior_high_school/Update_student_admission_status';
	$route['registrar/dept/juniorhs/update_student'] = 'registrar/department/juniorhs/Junior_high_school/Update_student';
	$route['registrar/dept/juniorhs/register_student'] = 'registrar/department/juniorhs/Junior_high_school/Register_student';
	$route['registrar/dept/juniorhs/new'] = 'registrar/department/juniorhs/Junior_high_school/New_student';
	$route['registrar/dept/juniorhs/check_stud_lrn'] = 'registrar/department/juniorhs/Junior_high_school/Check_lrn';
	$route['registrar/dept/juniorhs/get_payment_history'] = 'registrar/department/juniorhs/Junior_high_school/Get_payment_history';
	$route['registrar/dept/juniorhs/get_jhs_table_data'] = 'registrar/department/juniorhs/Junior_high_school/Get_jhs_table_data';
	$route['registrar/dept/juniorhs'] = 'registrar/department/juniorhs/Junior_high_school/Index';

	// SENIOR HIGH SCHOOL
	$route['registrar/dept/shs/view/upload_avatar'] = 'registrar/department/seniorhs/Senior_high_school/Upload_avatar';
	$route['registrar/dept/shs/view/check_fee_row'] = 'registrar/department/seniorhs/Senior_high_school/Check_fee_row';
	$route['registrar/dept/shs/view/get_assessment_info'] = 'registrar/department/seniorhs/Senior_high_school/Get_assessment_info';
	$route['registrar/dept/shs/edit/(:any)'] = 'registrar/department/seniorhs/Senior_high_school/Edit_student/$1';
	$route['registrar/dept/shs/view/(:any)'] = 'registrar/department/seniorhs/Senior_high_school/View_student/$1';
	$route['registrar/dept/shs/update_student_admission_status'] = 'registrar/department/seniorhs/Senior_high_school/Update_student_admission_status';
	$route['registrar/dept/shs/update_student'] = 'registrar/department/seniorhs/Senior_high_school/Update_student';
	$route['registrar/dept/shs/register_student'] = 'registrar/department/seniorhs/Senior_high_school/Register_student';
	$route['registrar/dept/shs/new'] = 'registrar/department/seniorhs/Senior_high_school/New_student';
	$route['registrar/dept/shs/check_stud_lrn'] = 'registrar/department/seniorhs/Senior_high_school/Check_lrn';
	$route['registrar/dept/shs/get_payment_history'] = 'registrar/department/seniorhs/Senior_high_school/Get_payment_history';
	$route['registrar/dept/shs/get_strand_list'] = 'registrar/department/seniorhs/Senior_high_school/Get_strand_list';
	$route['registrar/dept/shs/get_track_list'] = 'registrar/department/seniorhs/Senior_high_school/Get_track_list';
	$route['registrar/dept/shs/get_shs_table_data'] = 'registrar/department/seniorhs/Senior_high_school/Get_shs_table_data';
	$route['registrar/dept/shs'] = 'registrar/department/seniorhs/Senior_high_school/Index';

	// COLLEGE
	$route['registrar/dept/college/view/upload_avatar'] = 'registrar/department/college/College/Upload_avatar';
	$route['registrar/dept/college/view/check_fee_row'] = 'registrar/department/college/College/Check_fee_row';
	$route['registrar/dept/college/view/get_assessment_info'] = 'registrar/department/college/College/Get_assessment_info';
	$route['registrar/dept/college/edit/(:any)'] = 'registrar/department/college/College/Edit_student/$1';
	$route['registrar/dept/college/view/(:any)'] = 'registrar/department/college/College/View_student/$1';
	$route['registrar/dept/college/update_student_admission_status'] = 'registrar/department/college/College/Update_student_admission_status';
	$route['registrar/dept/college/update_student'] = 'registrar/department/college/College/Update_student';
	$route['registrar/dept/college/register_student'] = 'registrar/department/college/College/Register_student';
	$route['registrar/dept/college/new'] = 'registrar/department/college/College/New_student';
	$route['registrar/dept/college/get_payment_history'] = 'registrar/department/college/College/Get_payment_history';
	$route['registrar/dept/college/get_course_years'] = 'registrar/department/college/College/Get_course_years';
	$route['registrar/dept/college/get_student_course'] = 'registrar/department/college/College/Get_student_course';
	$route['registrar/dept/college/get_col_table_data'] = 'registrar/department/college/College/Get_col_table_data';
	$route['registrar/dept/college'] = 'registrar/department/college/College/Index';

// CASHIER
	// DASHBOARD
	$route['cashier/dashboard'] = 'cashier/dashboard/Dashboard/Index';

	// ELEMENTARY
	$route['cashier/dept/kinder/view/process_payment'] = 'cashier/department/kinder/Kinder/Process_payment';
	$route['cashier/dept/kinder/view/get_payables_info'] = 'cashier/department/kinder/Kinder/Get_payables_info';
	$route['cashier/dept/kinder/view/check_fee_row'] = 'cashier/department/kinder/Kinder/Check_fee_row';
	$route['cashier/dept/kinder/view/get_assessment_info'] = 'cashier/department/kinder/Kinder/Get_assessment_info';
	$route['cashier/dept/kinder/view/add_assessment'] = 'cashier/department/kinder/Kinder/Add_assessment';
	$route['cashier/dept/kinder/view/get_tuition_fee'] = 'cashier/department/kinder/Kinder/Get_tuition_fee';
	$route['cashier/dept/kinder/view/get_discount_amount'] = 'cashier/department/kinder/Kinder/Get_discount_amount';
	$route['cashier/dept/kinder/view/(:any)'] = 'cashier/department/kinder/Kinder/View_student/$1';
	$route['cashier/dept/kinder/get_payment_history'] = 'cashier/department/kinder/Kinder/Get_payment_history';
	$route['cashier/dept/kinder/get_kinder_table_data'] = 'registrar/department/kinder/Kinder/Get_kinder_table_data';
	$route['cashier/dept/kinder'] = 'cashier/department/kinder/Kinder/Index';

	// ELEMENTARY
	$route['cashier/dept/elementary/view/process_payment'] = 'cashier/department/elementary/Elementary/Process_payment';
	$route['cashier/dept/elementary/view/get_payables_info'] = 'cashier/department/elementary/Elementary/Get_payables_info';
	$route['cashier/dept/elementary/view/check_fee_row'] = 'cashier/department/elementary/Elementary/Check_fee_row';
	$route['cashier/dept/elementary/view/get_assessment_info'] = 'cashier/department/elementary/Elementary/Get_assessment_info';
	$route['cashier/dept/elementary/view/add_assessment'] = 'cashier/department/elementary/Elementary/Add_assessment';
	$route['cashier/dept/elementary/view/get_tuition_fee'] = 'cashier/department/elementary/Elementary/Get_tuition_fee';
	$route['cashier/dept/elementary/view/get_discount_amount'] = 'cashier/department/elementary/Elementary/Get_discount_amount';
	$route['cashier/dept/elementary/view/(:any)'] = 'cashier/department/elementary/Elementary/View_student/$1';
	$route['cashier/dept/elementary/get_payment_history'] = 'cashier/department/elementary/Elementary/Get_payment_history';
	$route['cashier/dept/elementary/get_elem_table_data'] = 'registrar/department/elementary/Elementary/Get_elem_table_data';
	$route['cashier/dept/elementary'] = 'cashier/department/elementary/Elementary/Index';

	// JUNIORHS
	$route['cashier/dept/juniorhs/view/process_payment'] = 'cashier/department/juniorhs/Junior_high_school/Process_payment';
	$route['cashier/dept/juniorhs/view/get_payables_info'] = 'cashier/department/juniorhs/Junior_high_school/Get_payables_info';
	$route['cashier/dept/juniorhs/view/check_fee_row'] = 'cashier/department/juniorhs/Junior_high_school/Check_fee_row';
	$route['cashier/dept/juniorhs/view/get_assessment_info'] = 'cashier/department/juniorhs/Junior_high_school/Get_assessment_info';
	$route['cashier/dept/juniorhs/view/add_assessment'] = 'cashier/department/juniorhs/Junior_high_school/Add_assessment';
	$route['cashier/dept/juniorhs/view/get_tuition_fee'] = 'cashier/department/juniorhs/Junior_high_school/Get_tuition_fee';
	$route['cashier/dept/juniorhs/view/get_discount_amount'] = 'cashier/department/juniorhs/Junior_high_school/Get_discount_amount';
	$route['cashier/dept/juniorhs/view/(:any)'] = 'cashier/department/juniorhs/Junior_high_school/View_student/$1';
	$route['cashier/dept/juniorhs/get_payment_history'] = 'cashier/department/juniorhs/Junior_high_school/Get_payment_history';
	$route['cashier/dept/juniorhs/get_jhs_table_data'] = 'registrar/department/juniorhs/Junior_high_school/Get_jhs_table_data';
	$route['cashier/dept/juniorhs'] = 'cashier/department/juniorhs/Junior_high_school/Index';

	// SENIORHIGH
	$route['cashier/dept/shs/view/process_payment'] = 'cashier/department/seniorhigh/Senior_high_school/Process_payment';
	$route['cashier/dept/shs/view/get_payables_info'] = 'cashier/department/seniorhigh/Senior_high_school/Get_payables_info';
	$route['cashier/dept/shs/view/check_fee_row'] = 'cashier/department/seniorhigh/Senior_high_school/Check_fee_row';
	$route['cashier/dept/shs/view/get_assessment_info'] = 'cashier/department/seniorhigh/Senior_high_school/Get_assessment_info';
	$route['cashier/dept/shs/view/add_assessment'] = 'cashier/department/shs/Senior_high_school/Add_assessment';
	$route['cashier/dept/shs/view/get_tuition_fee'] = 'cashier/department/shs/Senior_high_school/Get_tuition_fee';
	$route['cashier/dept/shs/view/get_discount_amount'] = 'cashier/department/seniorhigh/Senior_high_school/Get_discount_amount';
	$route['cashier/dept/shs/view/(:any)'] = 'cashier/department/seniorhigh/Senior_high_school/View_student/$1';
	$route['cashier/dept/shs/get_payment_history'] = 'cashier/department/seniorhigh/Senior_high_school/Get_payment_history';
	$route['cashier/dept/shs/get_shs_table_data'] = 'registrar/department/seniorhs/Senior_high_school/Get_shs_table_data';
	$route['cashier/dept/shs'] = 'cashier/department/seniorhigh/Senior_high_school/Index';

	// COLLEGE
	$route['cashier/dept/college/view/process_payment'] = 'cashier/department/college/College/Process_payment';
	$route['cashier/dept/college/view/get_payables_info'] = 'cashier/department/college/College/Get_payables_info';
	$route['cashier/dept/college/view/check_fee_row'] = 'cashier/department/college/College/Check_fee_row';
	$route['cashier/dept/college/view/get_assessment_info'] = 'cashier/department/college/College/Get_assessment_info';
	$route['cashier/dept/college/view/add_assessment'] = 'cashier/department/college/College/Add_assessment';
	$route['cashier/dept/college/view/get_discount_amount'] = 'cashier/department/college/College/Get_discount_amount';
	$route['cashier/dept/college/view/get_thesis_fee'] = 'cashier/department/college/College/Get_thesis_fee';
	$route['cashier/dept/college/view/get_tuition_fee'] = 'cashier/department/college/College/Get_tuition_fee';
	$route['cashier/dept/college/view/(:any)'] = 'cashier/department/college/College/View_student/$1';
	$route['cashier/dept/college/get_payment_history'] = 'cashier/department/college/College/Get_payment_history';
	$route['cashier/dept/college/get_col_table_data'] = 'cashier/department/college/College/Get_col_table_data';
	$route['cashier/dept/college'] = 'cashier/department/college/College/Index';