<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsultantCategoryController;
use App\Http\Controllers\CompanysettingsController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\ConsultantController;
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

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();

array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);
        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');

        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    //Master Page
    Route::prefix('master')->name('master.')->group(function () {

        Route::resource('currency', CurrencyController::Class)->only(['index', 'destroy']);
        Route::post('currency/datatable', [CurrencyController::Class,'datatable'])->name('currency.datatable');

        Route::resource('country', CountryController::Class)->only(['index', 'destroy']);
        Route::Post('country/datatable', [CountryController::Class,'datatable'])->name('country.datatable');
        Route::Post('country/getstate', [CountryController::Class,'getState'])->name('country.getState');
        Route::Post('country/getCity', [CountryController::Class,'getCity'])->name('country.getCity');

        Route::resource('state', StateController::Class)->only(['index', 'destroy','create','store']);
        Route::Post('state/datatable', [StateController::Class,'datatables'])->name('state.datatable');

        Route::resource('city', CityController::Class)->only(['index', 'destroy','create','store']);
        Route::get('city/datatable', [CityController::Class,'datatables'])->name('city.datatable');

        Route::resource('documents', DocumentController::Class)->only(['index','create','store','edit']);
        Route::Post('documents/datatable', [DocumentController::Class,'datatable'])->name('documents.datatable');
        Route::Post('documents/update/{id}', [DocumentController::Class,'update'])->name('documents.update');

        Route::resource('category', CategoryController::Class)->only(['index','create','store','edit']);
        Route::get('category/datatable', [CategoryController::Class,'datatable'])->name('category.datatable');
        Route::Post('category/update/{id}', [CategoryController::Class,'update'])->name('category.update');

        Route::resource('consultantcategory', ConsultantCategoryController::Class)->only(['index','create','store','edit']);
        Route::get('consultantcategory/datatable', [ConsultantCategoryController::Class,'datatable'])->name('consultantcategory.datatable');
        Route::Post('consultantcategory/update/{id}', [ConsultantCategoryController::Class,'update'])->name('consultantcategory.update');

    });
    //setting
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::resource('companysettings', CompanysettingsController::Class)->only(['create','store','index']);
        Route::Post('companysettings/datatable', [CompanysettingsController::Class,'datatable'])->name('companysettings.datatable');

    });
    //Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('user', UsersController::Class)->only(['index','create','store','destroy']);
        Route::Post('user/datatable',[UsersController::Class,'datatable'])->name('user.datatable');
    });
    //Admin
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('firms', FirmController::Class)->only(['index','create','store','destroy']);
        Route::Post('firms/datatable',[FirmController::Class,'datatable'])->name('firms.datatable');

        Route::resource('insurance', InsuranceController::Class)->only(['create','store','index']);
        Route::Post('insurance/datatable', [InsuranceController::Class,'datatable'])->name('insurance.datatable');
    });
    //Consultants
    Route::resource('consultant', ConsultantController::Class)->only(['create']);
    Route::Post('consultant/otp', [ConsultantController::Class,'generateotp'])->name('consultant.generateotp');
    Route::Post('consultant/verify', [ConsultantController::Class,'verify'])->name('consultant.verifyotp');

});

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
