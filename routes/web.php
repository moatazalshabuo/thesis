<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\MessageDiscussionController;
use App\Http\Controllers\SecreatRateController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ThesisController;
use App\Models\Discussion;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/noty', [App\Http\Controllers\HomeController::class, 'noty'])->name('noty');

Route::resource("students", StudentsController::class)->middleware('auth');

Route::resource('staffs', StaffController::class)->middleware('auth');

Route::resource("theses", ThesisController::class)->middleware('auth');

Route::controller(ThesisController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('admin/theses', 'indexAdmin')->name("theses.admin");
        Route::get('admin/f/theses', 'indexFAdmin')->name("theses.f.admin");
        Route::get('admin/a/theses', 'indexAAdmin')->name("theses.a.admin");
        Route::get('admin/c/theses','indexNAdmin')->name('theses.n.admin');
        Route::get('admin/theses/{id}', 'showAdmin')->name("thesesShow.admin");
        Route::get('admin/theses/{id}/active', 'activeAdmin')->name("thesesactive.admin");
        Route::get('admin/theses/{id}/dsactive', 'dsactiveAdmin')->name("thesesdsactive.admin");
        Route::get("admin/stu/theses/{id}","StuTheses")->name("stu.theses");
        // students urls
        Route::get('thesis/{id}', 'Thesis')->name("thesis.show");

        // rate
        Route::post('rate1', 'rate1')->name('rate1');
        Route::post('rate2', 'rate1')->name('rate2');

        Route::get('finish/{id}', 'finish')->name('finish');
        Route::get('unfinish/{id}', 'unfinish')->name('unfinish');
    });
});

Route::resource("discussion", DiscussionController::class)->middleware('auth');

Route::resource("message", MessageDiscussionController::class)->middleware('auth');

Route::controller(StaffController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('staff/request', 'SupervisionRequests')->name('staff.SupervisionRequests');
        Route::get('staff/Supervision', 'Supervision')->name('staff.Supervision');
        Route::get('staff/fSupervision', 'fSupervision')->name('staff.fSupervision');
        Route::get('Supervision/active/{id}', 'active')->name('Supervision.active');
        Route::get('Supervision/deactive/{id}', 'deactive')->name('Supervision.deactive');
        // student supervision

        Route::get('st/{id}/supervision', 'SupervisionOwn')->name("st.supervision");
        Route::post('create/supervision','Supervision_create')->name('Supervision.create');
        Route::get('delete/supervision/{id}','Supervision_delete')->name('Supervision.delete');
        Route::post('change/supervision', "changeSupervision1")->name("changeSupervision1");
        // Route::post('change/supervision', "changeSupervision2")->name("changeSupervision2");
        Route::get('profile-st/{id}',[StudentsController::class,"profile"])->name('profile.st');
    });
});

Route::controller(AdminController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('admin/create_thises','create_thesis')->name('admin.create_thesis');
        Route::post('admin/store_thises','store_thesis')->name('admin.store_thesis');
        Route::get('admin/cancel-thises','CancelThises')->name('admin.cancel_thesis');
        Route::get("admin/stf/theses/{id}","StfTheses")->name("stf.theses");
    });
});

Route::resource('secret',SecreatRateController::class)->middleware('auth');