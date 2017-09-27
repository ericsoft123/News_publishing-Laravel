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
    //return view('publish');
	 //return view('view_news');
	return view ('homenews');
	
	//return view ('home');
	/*redirect()->route('read_news');*/
	
});
/*Route::get('/','CategoryController@checkdata_exist')->name('checkdata_exist');
*/
Auth::routes();
Route::group(["middleware"=>'auth'],function(){
	//Route::get('/read_news','NewsController@read_news')->name('read_news');
//	Route::get('/read_news','NewsController@read_news')->name('read_news');
	

	Route::get('/getnewsregister','ViewnewsController@getnewsregister')->name('getnewsregister');
	Route::post('/getnewsregister','ViewnewsController@getnewsregister')->name('getnewsregister');
	
	Route::post('/publish_news','NewsController@publish_news')->name('publish_news');
Route::get('/publish_news','NewsController@publish_news')->name('publish_news');
	Route::post('/delete_newspost','NewsController@delete_newspost')->name('delete_newspost');
Route::get('/delete_newspost','NewsController@delete_newspost')->name('delete_newspost');
	Route::get('/read_news','NewsController@read_news')->name('read_news');	

});
Route::get('/getcategories','CategoryController@getcategories')->name('getcategories');

//Route::group(["middleware"=>'guest'],function(){
//
//// This means That This is The page user login can not access
//	
//});
Route::get('/searchnews','ViewnewsController@searchnews')->name('searchnews');

	Route::post('/getuserdata','RegisterController@getuserdata')->name('getuserdata');
	
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/view_newspost','NewsController@view_newspost')->name('view_newspost');
Route::post('/getmsg','NewsController@getmsg');
Route::get('/view_newspost','NewsController@view_newspost')->name('view_newspost');
Route::get('/viewdata','NewsController@viewdata')->name('viewdata');
Route::get('/sendmail','NewsController@sendmail')->name('sendmail');
Route::get('/test','NewsController@test')->name('test');
Route::post('/testa','NewsController@testa')->name('testa');
Route::get('/testa','NewsController@testa')->name('testa');
Route::get('/subscribe','NewsController@subscribe')->name('subscribe');

Route::get('/getnotification','NewsController@getnotification')->name('getnotification');

Route::get('/sendemailmult','NewsController@sendemailmult')->name('sendemailmult');

Route::get('/getnews','ViewnewsController@getnews')->name('getnews');
Route::get('/addviews','ViewnewsController@addviews')->name('addviews');
Route::get('/addlike','ViewnewsController@addlike')->name('addlike');
Route::get('/addexport','ViewnewsController@addexport')->name('addexport');

	Route::get('/rssfeed','ViewnewsController@rssfeed')->name('rssfeed');
Route::get('/getcomments','CommentController@getcomments')->name('getcomments');
Route::get('/postcomments','CommentController@postcomments')->name('postcomments');

Route::get('/checkdata_exist','CategoryController@checkdata_exist')->name('checkdata_exist');
Route::get('/sendmail','CategoryController@sendmail')->name('sendmail');
Route::get('/createpdf','CategoryController@createpdf')->name('createpdf');
Route::get('/getresult','CategoryController@getresult')->name('getresult');
//
Route::get('/getsignup','RegisterController@getsignup')->name('getsignup');
Route::post('/postsignup','RegisterController@postsignup')->name('postsignup');
Route::get('/getsignin','RegisterController@getsignin')->name('getsignin');
Route::post('/postsignin','RegisterController@postsignin')->name('postsignin');

//temp
//Route::get('/postsignin','RegisterController@postsignin')->name('postsignin');
//
Route::get('/confirm','RegisterController@confirm')->name('confirm');
Route::get('/pdfall','RegisterController@pdfall')->name('pdfall');
Route::get('/pdfone','RegisterController@pdfone')->name('pdfone');
Route::get('/reset','RegisterController@reset')->name('reset');
Route::get('/resetlink','RegisterController@resetlink')->name('resetlink');
Route::get('/getuserdata','RegisterController@getuserdata')->name('getuserdata');

Route::post('/newpassword','RegisterController@newpassword')->name('newpassword');
Route::get('/newpassword','RegisterController@newpassword')->name('newpassword');
Route::get('/sendemail_multiple','RegisterController@sendemail_multiple')->name('sendemail_multiple');
Route::get('/dataso','ViewnewsController@dataso')->name('dataso');


//Route::get('/read_news','NewsController@read_news')->name('read_news')->middleware('auth');
//Route::post('/read_news','NewsController@read_news')->name('read_news')->middleware('auth');











