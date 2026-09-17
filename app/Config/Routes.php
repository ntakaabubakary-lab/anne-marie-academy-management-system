<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Home::index');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

$routes->get('dashboard', 'Dashboard::index');


/*
|--------------------------------------------------------------------------
| STUDENT MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View all students */
$routes->get('students', 'Students::index');

/* Register student page */
$routes->get('students/add', 'Students::add');

/* Save student */
$routes->post('students/save', 'Students::save');

/* Edit student */
$routes->get('students/edit/(:num)', 'Students::edit/$1');

/* Update student */
$routes->post('students/update/(:num)', 'Students::update/$1');

/* Delete student */
$routes->get('students/delete/(:num)', 'Students::delete/$1');


/*
|--------------------------------------------------------------------------
| TEACHER MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View teachers */
$routes->get('teachers', 'Teachers::index');

/* Add teacher */
$routes->get('teachers/add', 'Teachers::add');

/* Save teacher */
$routes->post('teachers/save', 'Teachers::save');

/* Edit teacher */
$routes->get('teachers/edit/(:num)', 'Teachers::edit/$1');

/* Update teacher */
$routes->post('teachers/update/(:num)', 'Teachers::update/$1');

/* Delete teacher */
$routes->get('teachers/delete/(:num)', 'Teachers::delete/$1');


/*
|--------------------------------------------------------------------------
| CLASS MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View classes */
$routes->get('classes', 'Classes::index');

/* Add class */
$routes->get('classes/add', 'Classes::add');

/* Save class */
$routes->post('classes/save', 'Classes::save');

/* Edit class */
$routes->get('classes/edit/(:num)', 'Classes::edit/$1');

/* Update class */
$routes->post('classes/update/(:num)', 'Classes::update/$1');

/* Delete class */
$routes->get('classes/delete/(:num)', 'Classes::delete/$1');


/*
|--------------------------------------------------------------------------
| SUBJECT MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View subjects */
$routes->get('subjects', 'Subjects::index');

/* Add subject */
$routes->get('subjects/add', 'Subjects::add');

/* Save subject */
$routes->post('subjects/save', 'Subjects::save');

/* Edit subject */
$routes->get('subjects/edit/(:num)', 'Subjects::edit/$1');

/* Update subject */
$routes->post('subjects/update/(:num)', 'Subjects::update/$1');

/* Delete subject */
$routes->get('subjects/delete/(:num)', 'Subjects::delete/$1');
/*
|--------------------------------------------------------------------------
| EXAM MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View all exams */
$routes->get('exams', 'Exams::index');

/* Add exam */
$routes->get('exams/add', 'Exams::add');

/* Save exam */
$routes->post('exams/save', 'Exams::save');
/*
|--------------------------------------------------------------------------
| RESULTS MANAGEMENT
|--------------------------------------------------------------------------
*/

/* View results */
$routes->get('results', 'Results::index');

/* Add result */
$routes->get('results/add', 'Results::add');

/* Save result */
$routes->post('results/save', 'Results::save');
/* Save result */
$routes->post('results/save', 'Results::save');
$routes->get('attendance', 'Attendance::index');
$routes->get('attendance/add', 'Attendance::add');
$routes->post('attendance/save', 'Attendance::save');

$routes->get('attendance/edit/(:num)', 'Attendance::edit/$1');
$routes->post('attendance/update/(:num)', 'Attendance::update/$1');

$routes->get('attendance/delete/(:num)', 'Attendance::delete/$1');
$routes->get('fees', 'Fees::index');
$routes->get('fees/add', 'Fees::add');
$routes->post('fees/save', 'Fees::save');
$routes->get('fees/edit/(:num)', 'Fees::edit/$1');
$routes->post('fees/update/(:num)', 'Fees::update/$1');
$routes->get('fees/delete/(:num)', 'Fees::delete/$1');
/* Reports */
$routes->get('reports', 'Reports::index');
$routes->get('reports/students', 'Reports::students');
$routes->get('reports/teachers', 'Reports::teachers');
$routes->get('reports/attendance', 'Reports::attendance');
$routes->get('reports/fees', 'Reports::fees');
$routes->get('reports/results', 'Reports::results');
$routes->get('reports/classes', 'Reports::classes');
$routes->get('settings', 'Settings::index');$routes->get('logout', 'Auth::logout');
$routes->get('logout', 'Auth::logout');
$routes->get('login', 'Auth::login');
$routes->post('login/authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');







