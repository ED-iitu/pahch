<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\Localization\Localization;

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

Route::get('change-language/{locale}', function ($locale) {
    if (!in_array($locale, config('app.locales'))) {
        abort(404);
    }

    App::setLocale($locale);

    session()->put('locale', $locale);

    $segments = str_replace(url('/'), '', url()->previous());
    $segments = array_filter(explode('/', $segments));
    array_shift($segments);
    array_unshift($segments, $locale);

    return redirect()->to(implode('/', $segments));
});

Route::group(
    [
        'prefix'     => Localization::locale(),
        'middleware' => 'setLocale'
    ],
    function () {
        Auth::routes();

        Route::get('/admin', function () {
            return view('redesign.app');
        });

        Route::get('/', function () {
            return view('home');
        });

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('editProfile');
        Route::get('/about', [PageController::class, 'pageAboutOne'])->name('aboutOne');
        Route::get('/whatWeDo', [PageController::class, 'pageAboutTwo'])->name('aboutTwo');
        Route::get('/employees', [PageController::class, 'pageAboutThree'])->name('aboutThree');
        Route::get('/news', [NewsController::class, 'index'])->name('news');
        Route::get('/news/{news}', [NewsController::class, 'show'])->name('newsOne');
        Route::get('/partners', [PartnerController::class, 'list'])->name('partners');
        Route::get('partner/{id}', [PartnerController::class, 'getOne'])->name('partnerOne');
        Route::get('/materials', [MaterialController::class, 'list'])->name('materials');
        Route::get('material/{material}', [MaterialController::class, 'show'])->name('materialOne');
        Route::get('/courses', [CourseController::class, 'list'])->name('courses');
        Route::get('course/{course}', [CourseController::class, 'show'])->name('courseOne');
        Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
    }
);

