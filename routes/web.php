<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/clear-cache',function(){
    $exitCode = Artisan::call('cache:clear');
});

Route::group(['namespace' => 'shop'], function (){
	Route::get('/',[ShopController::class,'index'])->name('shop.index');
    Route::get('danh-muc/{slug}_{id}',[ShopController::class,'cat'])->name('shop.cat');
    Route::get('{slug}_{id}.html',[ShopController::class,'detail'])->name('shop.product');
    Route::post('{slug}_{id}.html',[ShopController::class,'postDetail'])->name('shop.product');
    Route::get('/gio-hang',[ShopController::class,'cart'])->name('shop.cart');
    Route::post('/gio-hang',[ShopController::class,'discount_code'])->name('shop.cart');
    Route::post('/them-san_pham',[ShopController::class,'addToBag'])->name('shop.addtobag');
    Route::get('/xoa/{cpid}',[ShopController::class,'delProduct'])->name('shop.delProduct');
    Route::get('/lien-he',[ShopController::class,'contact'])->name('shop.contact');
    Route::get('/gioi-thieu',[ShopController::class,'about'])->name('shop.about');
    Route::get('/404',[ShopController::class,'error'])->name('shop.error');
    Route::get('/blog',[ShopController::class,'blog'])->name('shop.blog');
});

Route::group(['namespace' => 'auth'], function (){
    Route::get('/dangnhap',[AuthController::class,'login'])->name('auth.login');
    Route::post('/dangnhap',[AuthController::class,'postLogin'])->name('auth.login');
    Route::get('/dangky',[AuthController::class,'signup'])->name('auth.signup');
    Route::post('/dangky',[AuthController::class,'postSignup'])->name('auth.signup');
	Route::get('/dangxuat',[AuthController::class,'logout'])->name('auth.logout');
    Route::get('/dangxuatAdmin',[AuthController::class,'logoutAdmin'])->name('auth.logoutadmin');
});

Route::group(['namespace' => 'mail'], function (){
    Route::get('/forget_password',[MailController::class,'forgetPassword'])->name('mail.forget_password');
    Route::get('/update_new_pass',[MailController::class,'updateNewPass'])->name('mail.reset_password');
    Route::post('/update_new_pass',[MailController::class,'resetNewPass'])->name('mail.reset_password');
    Route::post('/reset_password',[MailController::class,'resetPassword'])->name('mail.reset_password');
});

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::group(['prefix' => 'cat'], function (){
        Route::get('/',[CategoryController::class,'index'])->name('admin.cat.index');

        Route::get('/add',[CategoryController::class,'add'])->name('admin.cat.add')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/add',[CategoryController::class,'postAdd'])->name('admin.cat.add')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.cat.edit')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/edit/{id}',[CategoryController::class,'postEdit'])->name('admin.cat.edit')->middleware('role:admin@gmail.com|mod@gmail.com');;

        Route::get('/del/{id}',[CategoryController::class,'del'])->name('admin.cat.del')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/search',[CategoryController::class,'search'])->name('admin.cat.search');
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
        Route::get('/add',[ProductController::class,'add'])->name('admin.product.add')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/add',[ProductController::class,'postAdd'])->name('admin.product.add')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/edit/{id}',[ProductController::class,'postEdit'])->name('admin.product.edit')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/del/{id}',[ProductController::class,'del'])->name('admin.product.del')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/search',[ProductController::class,'search'])->name('admin.product.search');
    });
    Route::group(['prefix' => 'user'], function (){
        Route::get('/',[UsersController::class,'index'])->name('admin.user.index');
        Route::get('/add',[UsersController::class,'add'])->name('admin.user.add')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/add',[UsersController::class,'postAdd'])->name('admin.user.add')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/edit/{id}',[UsersController::class,'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}',[UsersController::class,'postEdit'])->name('admin.user.edit');

        Route::get('/del/{id}',[UsersController::class,'del'])->name('admin.user.del')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/search',[UsersController::class,'search'])->name('admin.user.search');
    });
    Route::group(['prefix' => 'comment'], function (){
        Route::get('',[CommentController::class,'index'])->name('admin.comment.index');
        Route::post('',[CommentController::class,'postIndex'])->name('admin.comment.index');
        
        Route::get('/add',[CommentController::class,'add'])->name('admin.comment.add')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/add',[CommentController::class,'postAdd'])->name('admin.comment.add')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/edit/{id}',[CommentController::class,'edit'])->name('admin.comment.edit')->middleware('role:admin@gmail.com|mod@gmail.com');
        Route::post('/edit/{id}',[CommentController::class,'postEdit'])->name('admin.comment.edit')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/del/{id}',[CommentController::class,'del'])->name('admin.comment.del')->middleware('role:admin@gmail.com|mod@gmail.com');

        Route::get('/search',[CommentController::class,'search'])->name('admin.comment.search');
    });
    Route::get('language/{language}',[LanguageController::class,'index'])->name('language.index');
});

Route::get('error', function (){
	return "<body style='background-color: #62fb62'>
				<div style='width: 600px;border: 1px solid yellow;text-align:center; margin: 210px auto; color:red'>
					<h1>Bạn không thể thực hiện chức năng này.</h1>
					<h1 >Vui lòng <a style = 'text-decoration:none; color: blue' href = '/admin'>QUAY LẠI</a></h1>
				</div>
			</body>";
			
});