<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use app\Models\User;
use App\Models\MultiPic;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();//first() for first ID data will get & get() for all data will be get
    $services = DB::table('services')->get();
    $images = MultiPic::all();
    return view('home' ,compact('brands','abouts','services','images'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
		// $users = User::all();
        return view('admin.index');
    })->name('dashboard');
});
// category route
Route::get('category/all/',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('category/add/',[CategoryController::class, 'AddCat'])->name('store.category');

Route::get('category/edit/{id}',[CategoryController::class, 'Edit']);
Route::post('category/update/{id}',[CategoryController::class, 'Update']);
Route::get('softDelete/category/{id}',[CategoryController::class, 'SoftDelete']);
Route::get('category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('delete/category/{id}',[CategoryController::class, 'Delete']);
// Brand Route
Route::get('brand/all/',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('brand/add/',[BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('brand/edit/{id}',[BrandController::class, 'Edit']);
Route::post('brand/update/{id}',[BrandController::class, 'Update']);
Route::get('brand/delete/{id}',[BrandController::class, 'Delete']);
// multi Image / after added template
Route::get('Multi/Image/',[BrandController::class, 'Multipic'])->name('multi.image');
Route::post('MultiImage/add/',[BrandController::class, 'StoreImage'])->name('store.image');

// log out
Route::get('User/logout/',[BrandController::class, 'Logout'])->name('user.logout');

// All Admin route============
// slider route
Route::get('home/slider/',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('add/slider/',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('store/Slider/',[HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('slider/edit/{id}',[HomeController::class, 'Edit']);
Route::post('slider/update/{id}',[HomeController::class, 'Update']);
Route::get('slider/delete/{id}',[HomeController::class, 'Delete']);
// Home About route
Route::get('home/about/',[AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('add/about/',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('store/about',[AboutController::class, 'StoreAbout'])->name('store.about');
// edit , update delete
Route::get('about/edit/{id}',[AboutController::class, 'Edit']);
Route::post('about/update/{id}',[AboutController::class, 'Update']);
Route::get('about/delete/{id}',[AboutController::class, 'Delete']);
// service route
Route::get('home/service/',[ServiceController::class, 'HomeService'])->name('home.service');
Route::get('add/service/',[ServiceController::class, 'AddService'])->name('add.service');
Route::post('store/service/',[ServiceController::class, 'StoreService'])->name('store.service');
// Edit update Delete
Route::get('service/edit/{id}',[ServiceController::class, 'Edit']);
Route::post('service/update/{id}',[ServiceController::class, 'Update']);
Route::get('service/delete/{id}',[ServiceController::class, 'Delete']);

// Portfolio Route
Route::get('/portfolio',[CommonController::class, 'Portfolio'])->name('portfolio');
// admin contact
Route::get('admin/contact',[CommonController::class, 'AdminContact'])->name('admin.contact');
Route::get('add/contact',[CommonController::class, 'AddContact'])->name('add.contact');
Route::post('store/contact',[CommonController::class, 'StoreContact'])->name('store.contact');
Route::get('admin/message',[CommonController::class, 'AdminMessage'])->name('admin.message');
Route::get('message/delete/{id}', [CommonController::class, 'MessageDelete']);

Route::get('contact/edit/{id}',[CommonController::class, 'ContactEdit']);
Route::post('contact/update/{id}', [CommonController::class, 'ContactUpdate']);
Route::get('contact/delete/{id}', [CommonController::class, 'ContactDelete']);

// Contact route
Route::get('contact/',[CommonController::class, 'Contact'])->name('contact');
Route::post('contact/form/',[CommonController::class, 'ContactForm'])->name('contact.form');

// ============User profile & setting ============
Route::get('user/password',[UserProfileController::class, 'Cpassword'])->name('change.password');
Route::post('update/password',[UserProfileController::class, 'Upadtepassword'])->name('update.password');
Route::get('change/profile',[UserProfileController::class, 'UProfile'])->name('user.profile');
Route::post('profile/update',[UserProfileController::class, 'PUpdate'])->name('profile.update');
