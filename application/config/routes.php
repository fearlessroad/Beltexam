<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['404_override'] = 'users';
$route['translate_uri_dashes'] = FALSE;
$route['register']='users/register';
$route['login']='users/login';
$route['poke/(:any)']='pokes/addpoke/$1';