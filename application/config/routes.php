<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//App management routes
$route['home'] = 'home';

//**********Product management routes**************
//All products
$route['products'] = "products/index";

//Create product
$route['productsCreate']['post'] = "products/store";

//Edit product form and controller
$route['productsEdit/(:any)'] = "products/edit/$1";
$route['productsUpdate/(:any)']['post'] = "products/update/$1";

//Delete a product
$route['productsDelete/(:any)']['delete'] = "products/delete/$1";

//Get the pdf version of products
$route['products-pdf-view'] = "pdf";



//**********User management routes**********
//Get all users route
$route['users'] = "users";

//Account page description
$route['account/(:any)'] = "users/account/$1";

//Create user ccount route and login route
$route['usersCreate']['post'] = "users/create";
$route['usersLogin']['post'] = "users/login";

//Edit user accounts form, 
$route['usersEdit/(:any)'] = "users/edit/$1";

//View account
$route['user/(:any)'] = "users/account/$1";

//UPDATE DELETE AND SEARCH
$route['usersUpdate/(:any)']['post'] = "users/update/$1";
$route['usersDelete/(:any)']['delete'] = "users/delete/$1";
$route['usersSearch/(:any)'] = "users/search/$1";

//get login and signup views
$route['signup/form'] = "users/signupform";
$route['login/form'] = "users/loginform";
$route['logout'] = "users/logout";