<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/redirect-by-role');
})->middleware(['auth'])->name('dashboard');

use App\Http\Controllers\SiswaController;


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
    Route::resource('siswa', SiswaController::class);

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru_mapel'])
    ->prefix('guru')
    ->group(function () {

        Route::get('/dashboard', function () {
            return 'DASHBOARD GURU';
        });

    });

/*
|--------------------------------------------------------------------------
| WALI KELAS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:wali_kelas'])
    ->prefix('wali')
    ->group(function () {

        Route::get('/dashboard', function () {
            return 'DASHBOARD WALI';
        });

    });

/*
|--------------------------------------------------------------------------
| REDIRECT ROLE
|--------------------------------------------------------------------------
*/

Route::get('/redirect-by-role', function () {
    $role = auth()->user()->role;

    if ($role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($role === 'guru_mapel') {
        return redirect('/guru/dashboard');
    } elseif ($role === 'wali_kelas') {
        return redirect('/wali/dashboard');
    }

    abort(403);
})->middleware('auth');

require __DIR__.'/auth.php';
