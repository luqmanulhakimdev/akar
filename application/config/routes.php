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

$route['absen'] = 'absen/absen';
$route['absen_pulang'] = 'absen/absen_pulang';

$route['absen/excel'] = 'absen/export_excel';

$route['data_absen'] = 'absen/data';
$route['data_absen/page/:num'] = 'absen/data';
$route['data_absen/page/'] = 'absen/data';

$route['detail_absen/(:any)'] = 'absen/detail_absen/$1';
$route['data_absenku'] = 'absen/dataku';
$route['data_absenku/page/:num'] = 'absen/dataku';
$route['data_absenku/page/'] = 'absen/dataku';

$route['data_karyawan'] = 'admin/data_karyawan';
$route['data_karyawan/page/:num'] = 'admin/data_karyawan';
$route['search/karyawan'] = 'admin/search';

$route['input_karyawan'] = 'admin/tambah_data';

$route['search/absen'] = 'absen/search';
$route['searchku/absen'] = 'absen/searchku';
$route['search/between'] = 'absen/search_between';
$route['cari_absen'] = 'absen/between';

$route['login'] = 'auth/login';
$route['login_admin'] = 'auth/login_admin';
$route['logout'] = 'auth/logout';

$route['admin/profile'] = 'admin/profile';
$route['admin/detail/(:any)'] = 'karyawan/profile/$1';
$route['admin/edit'] = 'admin/profile';
$route['admin/edit/(:any)'] = 'admin/edit/$1';

$route['profile'] = 'karyawan/profile';
//$route['edit_profile'] = 'karyawan/edit';
$route['edit_profile/(:any)'] = 'karyawan/edit/$1';
$route['edit_profile/(:any)/(:any)'] = 'karyawan/edit/$1/$2';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
