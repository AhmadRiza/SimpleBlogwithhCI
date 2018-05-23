<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'BlogController/index';

$route["admin/new-post"]["get"] = 'AdminController/post';
$route["admin/new-post"]["post"] = 'AdminController/posting';

$route['admin'] = 'AdminController/man_post';
$route['admin/del-post/(:any)'] = 'AdminController/delete/$1';
$route['admin/edit-post/(:any)']['get']= 'AdminController/edit/$1';
$route['admin/edit-post/(:any)']['post']= 'AdminController/editing/$1';

$route['admin/login']['get']= 'AdminController/login';
$route['admin/login']['post']= 'AdminController/setlogin';
$route['admin/logout']= 'AdminController/logout';

// ==========CATEGORY===============
$route['stories'] = 'BlogController/gallery/stories';
$route['tutorials'] = 'BlogController/tutorials';
$route['tutorials/android'] = 'BlogController/gallery/android';
$route['tutorials/web'] = 'BlogController/gallery/web';
$route['tutorials/cs'] = 'BlogController/gallery/cs';

$route['search'] = 'BlogController/gallery/search';

// ==============API================
$route['stories/loadmore'] = 'ApiController/loadmore/stories';
$route['tutorials/android/loadmore'] = 'ApiController/loadmore/android';
$route['tutorials/web/loadmore'] = 'ApiController/loadmore/web';
$route['tutorials/cs/loadmore'] = 'ApiController/loadmore/web';



// ==============READ PAGE===================
$route['stories/(:any)']['get'] = 'BlogController/read/$1';
$route['tutorials/web/(:any)']['get'] = 'BlogController/read/$1';
$route['tutorials/android/(:any)'] ['get']= 'BlogController/read/$1';
$route['tutorials/cs/(:any)']['get'] = 'BlogController/read/$1';
// =================coment=====================
$route['stories/(:any)']['post'] = 'BlogController/coment/$1';
$route['tutorials/web/(:any)']['post'] = 'BlogController/coment/$1';
$route['tutorials/android/(:any)'] ['post']= 'BlogController/coment/$1';
$route['tutorials/cs/(:any)']['post'] = 'BlogController/coment/$1';


// about
$route['about'] = 'BlogController/about';

// 
$route['subscribe'] = 'UtilsController/sub';


// ================================

$route['profiler'] = "Profiler_controller"; 
$route['profiler/disable'] = "Profiler_controller/disable";

// ================================
$route['404_override'] = 'UtilsController/load404';
$route['translate_uri_dashes'] = FALSE;