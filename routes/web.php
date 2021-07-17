<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginFormController;
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

// Route Login Form
Route::get('/Ngobar/Login', 'Auth\LoginController@showLoginForm')->name('Login-Form');

// Login Admin
Route::get('/Login/Admin/280589/Ngobar', 'LoginFormController@LoginAdmin')->name('Login-Admin');

// Login / Register Form Mentor
Route::get('/Login/Mentor/Ngobar', 'LoginFormController@LoginMentor')->name('Login-Mentor');
Route::get('/Register/Mentor/Ngobar', 'LoginFormController@RegisterMentor')->name('Register-Mentor');



// ------------------------------------------------------------------------------------------------------------------
// Guest Website Ngobar
Route::get('/Ngobar.com', 'WebsiteController@LandingPage')->name('Landing-Page');
Route::get('/Kelas', 'WebsiteController@Kelas')->name('Kelas');
Route::get('/Kelas-Ngobar', 'WebsiteController@kelasDetail')->name('Kelas-Detail');
Route::get('/Alur-Belajar', 'WebsiteController@AlurBelajar')->name('Alur-Belajar');
Route::get('/Forum-Diskusi', 'WebsiteController@ForumDiskusi')->name('Forum-Diskusi');
Route::get('/Forum-Diskusi-Tanya', 'WebsiteController@ForumDiskusiTanya')->name('Forum-Diskusi-Tanya');
Route::get('/Forum-Diskusi-Balas', 'WebsiteController@ForumDiskusiBalas')->name('Forum-Diskusi-Balas');
Route::get('/Mentor', 'WebsiteController@Mentor')->name('Mentor');
Route::get('/Mentor-Profile/{id}', 'WebsiteController@MentorProfile')->name('Mentor-Profile');

// --------------------------------------------------------------------------------------------------------------------
// Auth User 
Route::get('/Ngobar/Home', 'UserController@ProfileUser')->name('Profile-User');

// --------------------------------------------------------------------------------------------------------------------
// Auth Logout Thanks
Route::post('/Ngobar.com/Terimakasih', 'LogoutController@ThanksPage')->name('Thanks-Page-Logout');
Route::get('/Ngobar.com/Terimakasih', 'LogoutController@ThanksPageNew')->name('Thanks-Page-New');

// --------------------------------------------------------------------------------------------------------------------
//  Auth Mentor
Route::get('/Formulir/Daftar/Mentor', 'MentorController@Formulir')->name('Formulir');
Route::post('/formulir/store', 'MentorController@FormulirStore')->name('Formulir-Store');
Route::patch('/Ngobar/Mentor/Home', 'MentorController@ProfileMentorAktif')->name('Profile-Mentor-Aktif');
Route::delete('/data/mentor/reload/{id}', 'MentorController@reloadDataCv' )->name('Profile-Mentor-Delete');
Route::get('/Ngobar/Mentor/Home', 'MentorController@ProfileMentor')->name('Profile-Mentor');
Route::get('/Ngobar/Kelas', 'MentorController@tableKelas')->name('Table-Kelas');
Route::get('/create/kelas/premium', 'MentorController@createKelasPremium')->name('Create-Kelas-Premium');
Route::post('/store/kelas/premium', 'MentorController@storeKelasPremium')->name('Store-Kelas-Premium');
Route::get('/create/kelas/free', 'MentorController@createKelasFree')->name('Create-Kelas-Free');
Route::post('/store/kelas/free', 'MentorController@storeKelasFree')->name('Store-Kelas-Free');
Route::get('/edit/kelas/{id}', 'MentorController@editKelas')->name('Edit-Kelas');
Route::patch('/update/kelas/{id}','MentorController@updateKelas')->name('Update-Kelas');
Route::get('/kelas/create/materi/{id}', 'MentorController@createMateriKelas')->name('Create-Materi-Kelas');
Route::post('/store/materi/{id}', 'MentorController@storeMateri')->name('Store-Materi');
Route::get('/edit/materi/{id}', 'MentorController@editMateri')->name('Edit-Materi');
Route::post('/update/materi/{id}', 'MentorController@updateMateri')->name('Update-Materi');
Route::get('/cari/materi/{id}', 'MentorController@cari')->name('Cari-Materi');
Route::delete('/delete/kelas/{id}', 'MentorController@deleteKelas')->name('Delete-Kelas');


// -----------------------------------------------------------------------------------------------------------------
// Auth Admin
Route::get('/visit/ngobar', 'AdminController@visit')->name('Visit');
Route::get('/ngobar/mentor/all', 'AdminController@mentorAll')->name('Mentor-All');
Route::get('/ngobar/validasi/mentor', 'AdminController@validasiMentor')->name('Validasi-Mentor');
Route::get('/download/cv/{download}',  'AdminController@getDownload')->name('Download-Cv');
Route::patch('/validasi/cv/{id}', 'AdminController@validasiCv')->name('Validasi-Cv');
Route::patch('/validasi/cv/tolak/{id}', 'AdminController@validasiTolak')->name('Validasi-Tolak');
Route::get('/ngobar/mentor/aktif', 'AdminController@mentorAktif')->name('Mentor-Aktif');
Route::patch('/nonaktif/akun/{id}', 'AdminController@nonAktif' )->name('Non-Aktif');
Route::get('/ngobar/mentor/nonaktif', 'AdminController@mentorNonaktif')->name('Mentor-Nonaktif');
Route::patch('/aktif/akun/{id}', 'AdminController@Aktif' )->name('Aktif');
Route::post('/hapus/akun/mentor/{id}', 'AdminController@hapusAkunMentor')->name('Hapus-Akun-Mentor');
Route::get('/profile/mentor/{id}', 'AdminController@profileMentor')->name('Show-Akun-Mentor');

Route::get('/order/pay/user', 'AdminController@userPay')->name('User-Pay');
Route::get('/ngobar/user/all', 'AdminController@user')->name('User');
Route::patch('/nonaktif/user/akun/{id}', 'AdminController@userNonaktif')->name('User-Nonaktif');
Route::get('/ngobar/user/nonaktif', 'AdminController@nonaktifUser')->name('Nonaktif-User');
Route::delete('/hapus/akun/user/{id}', 'AdminController@hapusAkunUser')->name('Hapus-Akun-User');

// --------------------------------------------------------------------------------------------------------------------
// Error Page not Found
Route::get('/page-not-found/error/404', 'ErrorController@page1')->name('Page1');

// ----------------------------------------------------------------------------------------------------------------
Auth::routes();

Route::get('/Dashboard-Admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
