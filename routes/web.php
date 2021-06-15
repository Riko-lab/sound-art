<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// ############################### 
// #         DEV  ROUTES         # 
// ############################### 

Route::get('/test', 'HomeController@test')->name('test');  // ! SOLO PER TESTARE CODICE 



// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
// %         GUEST ROUTES        % 
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 

/**
 * HOME
 * http://localhost:8000/
 */
// # home page con ricerca semplice 
Route::get('/', 'HomeController@index')->name('home');

/**
 * SEARCH
 * http://localhost:8000/search
 */
Route::prefix('search')   	// prefisso URI raggruppamento sezione /search/...
	->group(function () {	// rotte specifiche search

		// # ricerca avanzata - atterraggio diretto senza filtri 
		Route::get('/', 'HomeController@search')->name('search'); 		// ! index() deve puntare a view('guest.profiles.search')

		// # ricerca avanzata - atterraggio da home page con filtri 
		Route::post('/', 'HomeController@search_from_home')->name('search_from_home'); //  {{ route('search_from_home') }}

	});

/**
 * Profile CRUD - parte guest (index, show)
 * http://localhost:8000/profiles
 */
Route::prefix('profiles')
	->group(function() {

		// versione 1
		Route::get('/', 'ProfileController@index')->name('profiles.index');		// ! index() deve puntare a view('guest.profiles.search')
		Route::get('/{slug}', 'ProfileController@show')->name('profiles.show');	// ! show()  deve puntare a view('guest.profiles.show')
		
		// versione 2
		Route::resource('/', ProfileController::class)->names([
				'index' 	=> 'profiles.index',
				'show' 		=> 'profiles.show',
				// 'create' => 'admin.posts.create',
				// 'store' 	=> 'admin.posts.store',
				// 'edit' 	=> 'admin.posts.edit',
				// 'update' => 'admin.posts.update',
				// 'destroy' => 'admin.posts.destroy',
			]);
		
	});	









// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
// %         ADMIN ROUTES        % 
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 

Auth::routes(); // signup presente in guest home
// Auth::routes(['register'=>false]); // disattivazione signup in guest home 

Route::prefix('admin')   	// prefisso URI raggruppamento sezione /admin/...
	->namespace('Admin')	// ubicazione dei Controller admin /app/Http/Controllers/Admin/...
	->middleware('auth')	// controllore autenticazione
	->group(function () {	// rotte specifiche admin

		// # DASHBOARD # 
		/**
		 * questa è la home dell'utente loggato! definita in laravel qua:
		 * 
		 * /app/Http/Providers/RouteServiceProvider
		 *		public const HOME = '/admin/dashboard';
		 *
		 * http://localhost:8000/admin/dashboard
		 */
		Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

		// # PROFILES # 
		/**
		 * Profile CRUD - parte admin (create, edit, delete)
		 * http://localhost:8000/admin/profiles
		 */
		Route::resource('/profiles', ProfileController::class)->names([
		// 	'index' 	=> 'admin.posts.index',
		// 	'show' 		=> 'admin.posts.show',
			'create' 	=> 'admin.posts.create',
			'store' 	=> 'admin.posts.store',
			'edit' 		=> 'admin.posts.edit',
			'update' 	=> 'admin.posts.update',
			'destroy' 	=> 'admin.posts.destroy',
		]);






		/**
		 * Category CRUD
		 */
		// Route::resource('/categories', CategoryController::class)->names([
		// 	'index' 	=> 'admin.categories.index',
		// 	'show' 		=> 'admin.categories.show',
		// 	'create' 	=> 'admin.categories.create',
		// 	'store' 	=> 'admin.categories.store',
		// 	'edit' 		=> 'admin.categories.edit',
		// 	'update' 	=> 'admin.categories.update',
		// 	'destroy' 	=> 'admin.categories.destroy',
		// ]);
		/**
		 * API con token
		 * pannello generazione token utente loggato
		 * generazione token 
		 */
		// Route::get('/profile', 'HomeController@profile')->name('admin-profile');
		// Route::post('/profile/generate-token', 'HomeController@generateToken')->name('admin.generate_token');
	});



