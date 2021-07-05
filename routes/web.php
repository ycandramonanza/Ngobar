<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
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
});

// Route Website Ngobar.com
Route::get('/Ngobar.com', 'WebsiteController@LandingPage')->name('Landing-Page');
Route::get('/Kelas', 'WebsiteController@Kelas')->name('Kelas');
Route::get('/Kelas-Ngobar', 'WebsiteController@kelasDetail')->name('Kelas-Detail');
Route::get('/Alur-Belajar', 'WebsiteController@AlurBelajar')->name('Alur-Belajar');
Route::get('/Forum-Diskusi', 'WebsiteController@ForumDiskusi')->name('Forum-Diskusi');
Route::get('/Forum-Diskusi-Tanya', 'WebsiteController@ForumDiskusiTanya')->name('Forum-Diskusi-Tanya');
Route::get('/Forum-Diskusi-Balas', 'WebsiteController@ForumDiskusiBalas')->name('Forum-Diskusi-Balas');
Route::get('/Mentor', 'WebsiteController@Mentor')->name('Mentor');
Route::get('/Mentor-Profile', 'WebsiteController@MentorProfile')->name('Mentor-Profile');

Auth::routes();

Route::get('/Dashboard-Admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
