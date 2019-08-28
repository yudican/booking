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
$route['about-us'] = 'about_us';
$route['about-us/partner'] = 'about_us/partner';
$route['about-us/testimonial'] = 'about_us/testimonial';
$route['about-us/contact'] = 'about_us/contact';
$route['about-us/contact-send'] = 'about_us/sendContact';
$route['news'] = 'home/news';
$route['news/(:num)'] = 'home/news/$1';
$route['news/(:num)/(:num)/(:num)/(:any)'] = 'home/news_detail';
$route['contact'] = 'home/contact';
$route['information'] = 'home/information';

$route['member/register'] = 'member';
$route['member/login'] = 'member/login';
$route['member/log-out'] = 'member/logout';
$route['member/booking-list'] = 'booking/bookingList';
$route['member/profile'] = 'booking/BookingListProfile';
$route['member/booking/detail/(:num)'] = 'booking/BookingDetail/$1';
$route['member/change/profile'] = 'member/changeProfile';
$route['member/change/password'] = 'member/changePassword';

//admin
$route['dashboard'] = 'admin/dashboard';
$route['dashboard/login'] = 'admin/auth';
$route['dashboard/log-out'] = 'admin/auth/logout';

$route['dashboard/upload'] = 'admin/dashboard/upload';
$route['dashboard/about-us'] = 'admin/pages';
$route['dashboard/about-us/update/(:num)'] = 'admin/pages/update/$1';
$route['dashboard/information'] = 'admin/pages/information';

$route['dashboard/news-list'] = 'admin/news';
$route['dashboard/news-list/insert'] = 'admin/news/createOrUpdate';
$route['dashboard/news-list/update/(:num)'] = 'admin/news/createOrUpdate/$1';
$route['dashboard/news-list/delete/(:num)'] = 'admin/news/delete/$1';


$route['dashboard/partner'] = 'admin/partner';
$route['dashboard/partner/insert'] = 'admin/partner/createOrUpdate';
$route['dashboard/partner/update/(:num)'] = 'admin/partner/createOrUpdate/$1';
$route['dashboard/partner/delete/(:num)'] = 'admin/partner/delete/$1';

$route['dashboard/contact'] = 'admin/pages/update_contact';

$route['dashboard/messages'] = 'admin/messages';
$route['dashboard/messages/detail/(:num)'] = 'admin/messages/detail/$1';
$route['dashboard/messages/delete/(:num)'] = 'admin/messages/msgDelete/$1';

$route['dashboard/testimonial'] = 'admin/testimonial';
$route['dashboard/testimonial/detail/(:num)'] = 'admin/testimonial/detail/$1';
$route['dashboard/testimonial/delete/(:num)'] = 'admin/testimonial/testimonialDelete/$1';
$route['dashboard/testimonial/publish/(:num)'] = 'admin/testimonial/publish/$1';
$route['dashboard/testimonial/unpublish/(:num)'] = 'admin/testimonial/unpublish/$1';

$route['dashboard/site-setting'] = 'admin/setting';
$route['dashboard/site-setting/store'] = 'admin/setting/site';

$route['dashboard/banner-setting'] = 'admin/banner';
$route['dashboard/banner-setting/insert'] = 'admin/banner/createOrUpdate';
$route['dashboard/banner-setting/update/(:num)'] = 'admin/banner/createOrUpdate/$1';
$route['dashboard/banner-setting/delete/(:num)'] = 'admin/banner/delete/$1';

$route['dashboard/member-list'] = 'admin/member';
$route['dashboard/member-list/(:num)'] = 'admin/member/index/$1';
$route['dashboard/member-list/delete/(:num)'] = 'admin/member/delete/$1';

$route['dashboard/change/profile'] = 'admin/member/changeProfile';
$route['dashboard/change/password'] = 'admin/member/changePassword';

$route['dashboard/booking-list'] = 'admin/booking';
$route['dashboard/booking-list/(:num)'] = 'admin/booking/index/$1';
$route['dashboard/booking-list/delete/(:num)'] = 'admin/booking/delete/$1';
$route['dashboard/booking-list/detail/(:num)'] = 'admin/booking/detail/$1';

$route['dashboard/category'] = 'admin/category';
$route['dashboard/category/delete/(:num)'] = 'admin/category/delete/$1';
$route['dashboard/category/edit/(:num)'] = 'admin/category/edit/$1';

$route['dashboard/service'] = 'admin/service';
$route['dashboard/service/delete/(:num)'] = 'admin/service/delete/$1';
$route['dashboard/service/edit/(:num)'] = 'admin/service/edit/$1';

$route['dashboard/employee'] = 'admin/employee';
$route['dashboard/employee/delete/(:num)'] = 'admin/employee/delete/$1';
$route['dashboard/employee/edit/(:num)'] = 'admin/employee/edit/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
