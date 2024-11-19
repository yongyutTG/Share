<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Main::login');

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/welcome', 'Main::welcome');

$routes->get('/Home/realtime', 'Home::realtime');


$routes->get('/Expenseinspec', 'Expenseinspec::index');
$routes->get('/Expenseinspec/get_data_expense', 'Expenseinspec::get_data_expense');
$routes->post('/Expenseinspec/get_data_expense', 'Expenseinspec::get_data_expense');

//ExpenseInspec/get_data_expense

$routes->post('/Data_dict/get_data_dict', 'Data_dict::get_data_dict');

$routes->post('/Debtor/get_data_debtor', 'Debtor::get_data_debtor');
$routes->post('/Debtor/get_m_data_debtor', 'Debtor::get_m_data_debtor');   

$routes->post('/General/auto_get_member', 'General::auto_get_member');   
$routes->post('/General/auto_get_empid', 'General::auto_get_empid');    
$routes->post('/General/auto_get_memid', 'General::auto_get_memid');     

$routes->group('Debtor', static function ($routes) {
    $routes->get('/', 'Debtor::index');
    //$routes->post('/get_data_debtor', 'Debtor::get_data_debtor');
});



$routes->post('/Debtor_invest/get_data_debtor', 'Debtor_invest::get_data_debtor');
$routes->post('/Debtor_invest/get_m_data_debtor', 'Debtor_invest::get_m_data_debtor');   
$routes->group('Debtor_invest', static function ($routes) {
    $routes->get('/', 'Debtor_invest::index');
    $routes->post('/get_data_debtor', 'Debtor_invest::get_data_debtor');
});













$routes->group('Data_dict', static function ($routes) {
    $routes->get('/', 'Data_dict::index');
});
$routes->group('member', static function ($routes) {
    $routes->get('/', 'Member::index');
});
$routes->group('systemControl', static function ($routes) {
    $routes->get('/', 'SystemControl::index');
});