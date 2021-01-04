<?php



use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('users.login');
});

Route::group(['prefix' => 'cities'], function () {
    Route::get('/', [CitiesController::class, 'index'])->name('cities.index');
    Route::get('/create', [CitiesController::class, 'create'])->name('cities.create');
    Route::post('/create', [CitiesController::class, 'store'])->name('cities.store');
    Route::get('/edit/{id}', [CitiesController::class, 'edit'])->name('cities.edit');
    Route::post('/edit/{id}', [CitiesController::class, 'update'])->name('cities.update');
    Route::get('/destroy/{id}', [CitiesController::class, 'destroy'])->name('cities.destroy');
    Route::get('/filter', [CitiesController::class, 'checkCreate'])->name('cities.checkCreate');
});



Route::group(['prefix' => 'customers'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create',[CustomerController::class, 'create'])->name('customers.create');
    Route::post('/create', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/edit/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/filter', [CustomerController::class, 'filterByCity'])->name('customers.filterByCity');
    Route::post('/search', [CustomerController::class, 'search'])->name('customers.search');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/create', [UserController::class, 'store'])->name('users.store');
    Route::post('/login', [UserController::class, 'authenticate'])->name('users.authenticate');
    Route::get('/logout', [UserController::class, 'logout'])->name('users.logout');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', [Controller::class, 'changeLanguage'])->name('user.change-language');

    Route::get('/', function() {
        return view('lists');
    });
});



