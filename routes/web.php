<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/contacts', function () {
    return view('pages/contact_page');
})->name('contacts');
Route::get('/costcalculator', function () {
    return view('pages/cost_calculator');
})->name('cost.calculator');

Route::get('payment/{id?}', function($id=null){
	return view('/pages.clients.orders.payment')->with('id',$id);
});
Route::get('success', function(){
	return view('/pages.clients.orders.success');
})->name('success');

Route::post('charge', 'PaymentController@charge')->name('charge');
 
Route::resource('orders', 'OrdersController');
Route::resource('dashboard', 'DashboardController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('client.dashboard');
Route::get('/griddashboard', 'DashboardController@gridLayout')->name('client.griddashboard');

Route::get('/settled', 'DashboardController@settled');
Route::get('/inprogress', 'DashboardController@inprogress');
Route::get('/paid', 'DashboardController@paid');
Route::get('/unpaid', 'DashboardController@unpaid');

Route::get('/settledlistlayout', 'DashboardController@settledListLayout')->name('client.settled.orders.list');
Route::get('/inprogresslistlayout', 'DashboardController@inprogressListLayout')->name('client.inprogress.orders.list');
Route::get('/paidlistlayout', 'DashboardController@paidListLayout')->name('client.paid.orders.list');
Route::get('/unpaidlistlayout', 'DashboardController@unpaidListLayout')->name('client.unpaid.orders.list');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/griddashboard', 'AdminController@gridLayout')->name('admin.griddashboard');
	
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/all', 'AdminFilterOrdersController@all')->name('admin.orders.all');
	Route::get('/settled', 'AdminFilterOrdersController@settled')->name('admin.orders.settled');
	Route::get('/inprogress', 'AdminFilterOrdersController@inprogress')->name('admin.orders.inprogress');
	Route::get('/paid', 'AdminFilterOrdersController@paid')->name('admin.orders.paid');
	Route::get('/unpaid', 'AdminFilterOrdersController@unpaid')->name('admin.orders.unpaid');



	Route::get('/all_gridlayout', 'AdminFilterOrdersController@allGridLayout')->name('admin.orders.all.gridlayout');
	Route::get('/settled_gridlayout', 'AdminFilterOrdersController@settledGridLayout')->name('admin.orders.settled.gridlayout');
	Route::get('/inprogress_gridlayout', 'AdminFilterOrdersController@inprogressGridLayout')->name('admin.orders.inprogress.gridlayout');
	Route::get('/paid_gridlayout', 'AdminFilterOrdersController@paidGridLayout')->name('admin.orders.paid.gridlayout');
	Route::get('/unpaid_gridlayout', 'AdminFilterOrdersController@unpaidGridLayout')->name('admin.orders.unpaid.gridlayout');
});

Route::get('allblogs', 'BlogLinksController@allBlogs')->name('all.blogs');
Route::get('legalblogs/{category}', 'BlogLinksController@legalBlogs')->name('legal.blogs');
Route::get('accountingblog', 'BlogLinksController@accountingBlog')->name('accounting.blog');
Route::get('mathblog', 'BlogLinksController@mathBlog')->name('math.blog');
Route::get('statisticsblog', 'BlogLinksController@statisticsBlog')->name('statistics.blog');
Route::get('about', 'BlogLinksController@about')->name('about');
Route::get('termsandconditions', 'BlogLinksController@termsandconditions')->name('termsandconditions');
Route::get('privacypolicy', 'BlogLinksController@privacypolicy')->name('privacypolicy');
Route::get('contact', 'BlogLinksController@contact')->name('contact');



Route::resource('adminfunctions', 'AdminController');

Route::get('tpa/{category}', 'BlogController@editTPA')->name('edit.TPA');
Route::resource('blogposts', 'BlogController');
Route::get('post_dashboard', 'BlogController@dashboard')->name('post.dashboard');
Route::get('listblogs', 'BlogController@listBlogs')->name('list.blogs');


Route::post('updateprogress', 'AdminController@updateProgress')->name('updateprogress');
Route::get('showadminfiles/{id?}', 'AdminController@showFiles')->name('admin.showfiles');
Route::get('showclientfiles/{id?}', 'DashboardController@showFiles')->name('client.showfiles');

Route::get('/file/download/{id}', 'FileController@download')->name('downloadfiles');




Route::get('addpost/{category}', 'BlogController@addPost')->name('add.post');

Route::get('clientordermessages/{id?}', 'MessageController@index')->name('client.ordermessages');
Route::resource('ordermessages', 'MessageController');

Route::get('adminordermessages/{id?}', 'AdminMessageController@index')->name('admin.ordermessages');
Route::resource('adminordermessages', 'AdminMessageController');


Route::get('chat/{id}', 'ChatsController@index')->name('chat');
Route::get('messages/{id}', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

//revision routes front end
Route::get('revisions/{id}', 'RevisionsController@index')->name('revisions.index');
Route::get('createrevisions/{id}', 'RevisionsController@create')->name('revisions.create');
Route::resource('revision', 'RevisionsController');

//revision routes back end
Route::get('adminrevisions/{id}', 'AdminRevisionController@index')->name('adminrevisions.index');

Route::resource('adminrevision', 'AdminRevisionController');


Route::get('approve/{id}', 'OrdersController@approve')->name('approve');
 //search by id

Route::post('searchbyidclientlistlayout', 'DashboardController@searchByIdListLayout')->name('client.searchbyidlist');

Route::post('searchbyidclientgridlayout', 'DashboardController@searchById')->name('client.searchbyidgrid');

Route::post('searchbyidadminlistlayout', 'AdminFilterOrdersController@searchByIdListLayout')->name('admin.searchbyidlist');

Route::post('searchbyidadmingridlayout', 'AdminFilterOrdersController@searchById')->name('admin.searchbyidgrid');

//contacts and abuse reports
Route::resource('contactmessages', 'ContactsController');

Route::get('listcontacts', 'AdminController@listContacts')->name('contacts.list');
Route::post('searchContactsByEmail', 'ContactsController@searchByEmail')->name('contacts.searchByEmail');


//users
Route::resource('users', 'UserController');
Route::post('searchByEmail', 'UserController@searchByEmail')->name('users.searchByEmail');

Route::get('/mail', function(){
	return new App\Mail\NewOrderNotificationClient();
});