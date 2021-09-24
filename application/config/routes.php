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
//routers dashboard
$route['dashboard/pengaturan'] = 'dashboard/Dashboard/pengaturan';
$route['dashboard/produk'] = 'dashboard/Dashboard/produk';
$route['dashboard/kategori'] = 'dashboard/Kategori';
$route['dashboard/tambah-kategori'] = 'dashboard/Kategori/tambah';
$route['dashboard/edit-kategori/(:num)'] = 'dashboard/Kategori/edit/$1';
$route['dashboard/index'] = 'dashboard/Dashboard';
$route['dashboard/edit-produk/(:num)'] = 'dashboard/Dashboard/edit_produk/$1';
$route['dashboard/tambah-produk'] = 'dashboard/Dashboard/tambah_produk';
$route['dashboard/add-gambar-produk/(:num)'] = 'dashboard/Dashboard/gambar_produk/$1';

//routes home frontend
$route['detail-produk/(:any)'] = 'frontend/Home/detail_produk/$1';
//routes shop list
$route['list-produk'] = 'frontend/Home/list_produk';
$route['list-produk/(:num)'] = 'frontend/Home/list_produk/$1';
$route['cari'] = 'frontend/Home/cari';
$route['cari/(:num)'] = 'frontend/Home/cari/$1';
$route['kategori'] = 'frontend/Home/cari_kategori';
$route['kategori/(:num)'] = 'frontend/Home/cari_kategori/$1';
//routes cart
$route['cart']= 'frontend/Cart';

$route['default_controller'] = 'frontend/Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
