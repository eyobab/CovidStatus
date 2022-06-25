<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\CheckAdmin;

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

 
 //Route::redirect('/', App::getLocale());

 //Route::group(['prefix' => App::getLocale()], function () {  
       
        Route::get('/', function () {
            return view('welcome');
        });

        //Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

        Route::get('/card', function () {
            return view('card');
        })->middleware(CheckAdmin::class);


        Route::get('/testpage', function () {
            return view('testpage');
        })->middleware(CheckAdmin::class);



        Route::get('/check', function () {
            return view('check');
        });

        Route::get('/post', function () {
            return view('test.post');
        })->name('post');


        Route::get('/settings/{id}', 'PassController@index' );
        /*
        Route::get('/settings', function () {
            return view('admin.settings');
        });
        */

      
       
        
        Auth::routes();
        
        Route::resource('/products', 'ProductController');
        Route::resource('/profiles', 'ProfileController'); 
        Route::resource('/statuses', 'StatusController'); 
        Route::resource('/reports', 'ReportController');  
        Route::resource('/infos', 'InfoController');  

        Route::resource('/admin', 'AdminController')->middleware(CheckAdmin::class); 
 

        Route::get('/home', function() {
            return view('home');
        })->name('home', App::getLocale())->middleware('auth');


        Route::group(['middleware' => ['admin']], function() {

          Route::get('/admin', 'AdminController@index')->name('admin');
          Route::get('/admin/promote/{userId}', 'AdminController@promote')->name('promote');
          Route::get('/admin/demote/{userId}', 'AdminController@demote')->name('demote');
          Route::get('/admin-status', 'StatusAdminController@index')->name('admin-status');
          Route::get('/admin-report', 'ReportAdminController@index')->name('admin-report');
          Route::get('/profilelist', 'ProfileController@list')->name('profilelist');

        });



        //For password reset

        Route::get('change-password', 'ChangePasswordController@index');

        Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

        Route::get('downloadfile/{filepath}', function ($filepath) {
           // dd($filepath);
            return Response::download($filepath);
        })->name('download');

  //});




/*
        Route::get('ipadd', function () {

        	  $ip = '197.156.118.140';
            $data = \Location::get($ip);
                    
            $lat = $data->latitude;
            dd($lat);
            dd($data);
           
        });



        Route::get('ipss', function () {

        	$data = \Location::get();
            dd($data);
           
        });

        Route::get('gglip', function () {
               $response = \GoogleMaps::load('geocoding')
                ->setParam (['address' =>'Wello Sefer, Addis Ababa'])
                ->get();

                dd($response);
           
        });


        Route::get('tomip', function () {
               $response = \GoogleMaps::load('geocoding')
                ->setParam (['address' =>'Wello Sefer, Addis Ababa'])
                ->get();

                dd($response);
           
        });

        Route::get('geoip', function () {
              // $ip = Request::ip();
               $ip = '197.156.118.140';
              
                   $response = geoip()->getLocation($ip);
          

                dd($response);
           
        });


*/