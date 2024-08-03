<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\AdminSaranaController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Home\AkademikController;
use App\Http\Controllers\Home\KesiswaanController;
use App\Http\Controllers\AdminAchievmentController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\AchievmentController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\UserProfileController;






Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/berita', [PostController::class, 'index'])->name('posts');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('post');
// Profile
Route::prefix('/profile')->controller(ProfileController::class)->group(function () {
    Route::get('/identitas', 'identitas')->name('identitas');
    Route::get('/sambutan', 'sambutan')->name('sambutan');
    Route::get('/struktural', 'struktur')->name('struktur');
    Route::get('/sejarah', 'sejarah')->name('sejarah');
    Route::get('/visi-misi', 'visi')->name('visi');
});
// Akademik
Route::prefix('/akademik')->controller(AkademikController::class)->group(function () {
    Route::get('/kurikulum', 'kurikulum')->name('kurikulum');
    Route::get('/sarana-prasarana', 'sarana')->name('sarana');
    Route::get('/biografi', 'biografi')->name('biografi');
});
// Achievment/Prestasi
Route::prefix('/prestasi')->controller(AchievmentController::class)->group(function () {
    Route::get('/akademik', 'akademik')->name('akademik');
    Route::get('/nonakademik', 'nonakademik')->name('nonakademik');
    Route::get('/santri', 'student')->name('students.prestasi');
});
// Kesiswaan
Route::prefix('/kesiswaan')->controller(KesiswaanController::class)->group(function () {
    Route::get('/ekstrakulikuler', 'lifeskill')->name('lifeskill');
    Route::get('/persada', 'persada')->name('persada');
    Route::get('/album', 'album')->name('album');
});
// Pendaftaran PPDB
Route::prefix('/ppdb')->controller(PpdbController::class)->group(function () {
    Route::get('/info-pendaftaran',  'home')->name('ppdb.home');
    Route::get('/formulir-pendaftaran',  'daftar')->name('ppdb.daftar');
    Route::get('/downloads', 'download')->name('downloading');
    Route::get('/download/brosur/{id}', 'downloadBrosur')->name('downloadBrosur');
    Route::middleware(['siswa'])->group(function () {
        Route::get('/biodata', 'profileRegister')->name('ppdb.profile');
        Route::get('/download/formulir/{id}', 'downloadForm')->name('downloadForm');
    });
});

/** ROUTE BAGIAN DASHBOARD */
// User dan admin
Route::group(['middleware' => ['role']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/post/slug', [AdminPostController::class, 'slug']);
    Route::resource('/dashboard/posts', AdminPostController::class)->names('apost');
    Route::get('/sarana/slug', [AdminSaranaController::class, 'slug']);
    Route::resource('/dashboard/sarana', AdminSaranaController::class)->names('asarana');
    Route::get('/mapels/slug', [AdminGuruController::class, 'slug']);
    Route::resource('/dashboard/guru', AdminGuruController::class)->names('guru');
    Route::get('/achievments/slug', [AdminAchievmentController::class, 'slug']);
    Route::get('/dashboard/pendaftaran', [AdminStudentController::class, 'index'])->name('daftar.index');
    Route::resource('/dashboard/prestasi', AdminAchievmentController::class)->names('prestasi');
    Route::get('/dashboard/pendaftaran/{student}/show', [AdminStudentController::class, 'show'])->name('daftar.show');
    Route::get('/dashboard/pendaftaran/{student}/edit', [AdminStudentController::class, 'edit'])->name('daftar.edit');
    Route::put('/dashboard/pendaftaran/{student}/update', [AdminStudentController::class, 'update'])->name('daftar.update');
    Route::get('/dashboard/profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
    Route::post('/reset-password', [UserProfileController::class, 'updatepassword'])->name('password.update');
    Route::post('/update/profile', [UserProfileController::class, 'updateprofile'])->name('profile.update');
});

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/category/slug', [AdminCategoryController::class, 'slug']);
    Route::resource('/dashboard/categories', AdminCategoryController::class)->names('category');
    Route::resource('/dashboard/users', AdminUserController::class)->names('user');
    Route::prefix('/dashboard')->controller(DashboardController::class)->group(function () {
        Route::get('/ekstrakulikuler',  'lifeskill')->name('admin.lifeskill');
        Route::get('/mapel',  'mapel')->name('admin.mapel');
        Route::get('/struktural',  'struktur')->name('admin.struktur');
        Route::get('/persada',  'persada')->name('admin.persada');
        Route::get('/bidang',  'bidang')->name('admin.bidang');
        Route::get('/jabatan',  'jabatan')->name('admin.jabatan');
        Route::get('/pengaturan', 'generalSetting')->name('pengaturan');
        Route::get('/pengaturan/pendaftaran', 'setDaftar')->name('set.reg');
        Route::post('/pengaturan/sambutan', 'sambutan')->name('pengaturan.sambutan');
    });
    Route::prefix('/import')->controller(ImportExcelController::class)->group(function () {
        Route::post('/jabatan',  'jabatan')->name('import.jabatan');
        Route::post('/bidang',  'bidang')->name('import.bidang');
        Route::post('/mapel',  'mapel')->name('import.mapel');
        Route::post('/guru',  'guru')->name('import.guru');
        Route::post('/sarana',  'sarana')->name('import.sarana');
        Route::post('/prestasi',  'prestasi')->name('import.prestasi');
        Route::post('/lifeskill',  'lifeskill')->name('import.lifeskill');
    });
});

// Errors Handling 
Route::fallback(function () {
    return view('errors.404');
});
