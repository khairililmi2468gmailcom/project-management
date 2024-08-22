<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');

$routes->get('/user', 'user::user');
$routes->get('/adduser', 'user::adduser');
$routes->post('/proses_adduser', 'user::proses_adduser');
$routes->get('/view_user/(:num)', 'user::view_user/$1');
$routes->post('/update/(:segment)', 'User::update/$1');
$routes->post('/update_profil/(:segment)', 'User::update_profil/$1');
$routes->get('/edit_user/(segment)', 'user::edit_user/$1');
$routes->delete('/user/(:num)', 'user::delete/$1');

// $routes->get('request', 'request::request');

$routes->get('tugas', 'tugas::tugas');
$routes->get('kerjakan/(:num)', 'tugas::kerjakan/$1');
$routes->post('/proses_addprogres', 'tugas::proses_addprogres');
$routes->get('detail_tugas/(:num)', 'tugas::detail_tugas/$1');

$routes->get('project', 'project::project');
$routes->get('add_project', 'project::add_project');
$routes->post('proses_add_project', 'project::proses_add_project');
$routes->get('detail_project/(:num)', 'project::detail_project/$1');
$routes->delete('/project/delete/(:num)', 'project::delete/$1');
$routes->get('modul/(:num)', 'modul::modul/$1');
$routes->post('proses_add_modul', 'modul::proses_add_modul');
$routes->delete('/modul/delete/(:num)', 'modul::delete/$1');
$routes->get('modul', 'Modul::modul'); // Menampilkan halaman profil
$routes->post('upload_file/(:segment)', 'Modul::upload_file/$1');
$routes->get('generatePDF', 'Modul::generatePDF');
$routes->get('view_pdf/(:any)', 'Modul::view_pdf/$1');

$routes->get('progres', 'progres::progres');

$routes->get('report', 'report::report');

// $routes->get('profile', 'profile::profile');

$routes->get('profile', 'Profile::index');
$routes->post('profile', 'Profile::index');

$routes->get('request', 'Request::index');
$routes->get('request/approveRequest/(:num)', 'Progres::approveRequest/$1');
$routes->get('request/rejectRequest/(:num)', 'Progres::rejectRequest/$1');

// $routes->get('/project_users', 'ProjectUsers::index');
// $routes->get('/project_users/detail_project/(:num)', 'ProjectUsers::detail_project/$1');
// $routes->get('/project_users/detail_tugas/(:num)', 'ProjectUsers::detail_tugas/$1');
// $routes->get('/project_users/view_all_projects/(:num)', 'ProjectUsers::view_all_projects/$1');
// $routes->get('/project_users/view_all_modules/(:num)', 'ProjectUsers::view_all_modules/$1');

// $routes->get('login', 'login::login');
// $routes->get('register', 'register::register');
