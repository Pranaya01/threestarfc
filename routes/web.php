<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

// Route::group([ 'middleware'=> ['admin'], ('verified')], function(){

Route::group(['middleware' => ['auth', 'verified', 'admin']], function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('admin/users', 'Admin\UserController');
    Route::get('usersearch', 'Admin\UserController@usersearch')->name('usersearch');
    
    Route::resource('admin/image-slider', 'Admin\ImageSliderController');

    Route::resource('admin/news', 'Admin\NewsController');
    Route::get('newsearch', 'Admin\NewsController@newsearch')->name('newsearch');


    Route::resource('admin/board', 'Admin\BoardController');
    Route::get('boardsearch', 'Admin\BoardController@boardsearch')->name('boardsearch');

    Route::resource('admin/lifemembers', 'Admin\LifeMembersController');
    Route::get('lifemembersearch', 'Admin\LifeMembersController@lifemembersearch')->name('lifemembersearch');


    Route::resource('admin/pastpresidents', 'Admin\PastPresidentsController');
    Route::get('past_search', 'Admin\PastPresidentsController@past_search')->name('past_search');


    Route::resource('admin/first-team', 'Admin\FirstTeamController');
    Route::get('team_search', 'Admin\FirstTeamController@team_search')->name('team_search');

    Route::resource('admin/second-team', 'Admin\JuniorTeamController');

    Route::resource('admin/past-players', 'Admin\FormerPlayersController');

    Route::resource('admin/staff', 'Admin\StaffController');
    Route::get('staff_search', 'Admin\StaffController@staff_search')->name('staff_search');
  
    Route::resource('admin/tournament', 'Admin\TournamentController');
    Route::get('tournamentsearch', 'Admin\TournamentController@tournamentsearch')->name('tournamentsearch');
    
    Route::resource('admin/achievement', 'Admin\AchievementController');
    Route::get('achievement_search', 'Admin\AchievementController@achievement_search')->name('achievement_search');
    
    Route::resource('admin/founders', 'Admin\FoundersController');


    // Route::resource('admin/fixtures', 'Admin\FixturesController');
    // Route::get('admin/fixturesearch', 'Admin\FixturesController@fixturesearch')->name('fixturesearch');
});
// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('', 'IndexController');
Route::get('about-us', 'AboutUsController@index')->name('index');
Route::get('threestarcafe', 'AboutUsController@threestarcafe')->name('threestarcafe');
Route::get('president-message', 'AboutUsController@president_msg')->name('president_msg');
Route::get('founders', 'AboutUsController@founders')->name('founders');


Route::resource('board-of-directors', 'BODController');
Route::resource('past-presidents', 'PastPresidentsController');
Route::resource('life-members', 'LifeMembersController');

Route::resource('senior-team', 'FirstTeamController');
Route::resource('junior-team', 'YouthTeamController');
Route::get('former-players', 'FirstTeamController@formerplayers')->name('formerplayers');


Route::resource('officials', 'OtherStaffController');

Route::resource('article', 'UserNewsController');
Route::get('title-achievement', 'UserAchievementController@index')->name('index');

Route::get('contact-us', 'ContactController@getContact')->name('getContact');
Route::post('contact-us', 'ContactController@saveContact')->name('saveContact');






