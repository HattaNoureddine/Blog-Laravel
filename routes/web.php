<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\Admin;

Auth::routes();
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/',[GuestController::class,'home']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware('auth','admin');
Route::get('/client/dashboard',[ClientController::class,'dashboard'])->middleware('auth','is_active');

#route categories
Route::get('/admin/categories',[CategorieController::class,'index'])->middleware('auth','admin');
Route::post('/admin/categories/store',[CategorieController::class,'store'])->middleware('auth','admin');
Route::post('/admin/categories/update',[CategorieController::class,'update'])->middleware('auth','admin');
Route::get('/admin/categories/{id}/delete',[CategorieController::class,'destroy'])->middleware('auth','admin');



#route posts
Route::get('/admin/posts',[PostController::class,'index'])->middleware('auth','admin');
Route::post('/admin/posts/store',[PostController::class,'store'])->middleware('auth','admin');
Route::post('/admin/posts/update',[PostController::class,'update'])->middleware('auth','admin');
Route::get('/admin/posts/{id}/delete',[PostController::class,'destroy'])->middleware('auth','admin');



Route::get('/admin/posts/status',[PostController::class,'status'])->middleware('auth','admin');
Route::get('/admin/posts/{id}/bloquer',[PostController::class,'BloquerPost'])->middleware('auth','admin');
Route::get('/admin/posts/{id}/activer',[PostController::class,'ActiverPost'])->middleware('auth','admin');

#route reviews
Route::get('/admin/reviews',[ReviewController::class,'index'])->middleware('auth','admin');
Route::get('/admin/reviews/{id}/vu',[ReviewController::class,'vu'])->middleware('auth','admin');
#route ajouter article
Route::get('/user/article',[ClientController::class,'addArticle'])->middleware('auth','is_active');
Route::post('/user/article/store',[ClientController::class,'storeArticle'])->middleware('auth','is_active');


#user 
Route::get('/posts/details/{id}',[GuestController::class,'postDetails']);
Route::get('/posts/{idcategory}/liste',[GuestController::class,'categoryliste']);
Route::post('/user/review/store',[ClientController::class,'addReview'])->middleware('auth','is_active');
Route::get('/user/profile',[ClientController::class,'profile'])->middleware('auth','is_active');
Route::post('/user/profile/update',[ClientController::class,'updateProfile'])->middleware('auth','is_active');
Route::post('/user/email/store',[ClientController::class,'emailenvoyer']);
Route::post('/user/search',[GuestController::class,'search']);

#bloquer activer user
Route::get('/admin/users',[AdminController::class,'users'])->middleware('auth','admin');
Route::get('/admin/users/{iduser}/bloquer',[AdminController::class,'BloquerUser'])->middleware('auth','admin');
Route::get('/admin/users/{iduser}/activer',[AdminController::class,'ActiverUser'])->middleware('auth','admin');
Route::get('/client/bloquer',[ClientController::class,'afficherMessageBloquer'])->middleware('auth');

Route::get('/admin/listadmin',[AdminController::class,'listeadmin'])->middleware('auth','admin');
Route::post('/admin/store',[AdminController::class,'store'])->middleware('auth','admin');
Route::get('/admin/{id}/delete',[AdminController::class,'destroy'])->middleware('auth','admin');
Route::post('/admin/update',[AdminController::class,'update'])->middleware('auth','admin');

Route::post('/admin/post/search',[PostController::class,'searchPost'])->middleware('auth','admin');
Route::post('/admin/categorie/search',[CategorieController::class,'searchCategorie'])->middleware('auth','admin');
Route::post('/admin/user/search',[ClientController::class,'searchUser'])->middleware('auth','admin');
Route::post('/admin/admin/search',[AdminController::class,'searchAdmin'])->middleware('auth','admin');

# route règlements 
Route::get('/user/reglements',[ClientController::class,'reglements'])->middleware('auth','is_active');

Route::get('/admin/reglements',[AdminController::class,'reglements'])->middleware('auth','admin');
Route::post('/admin/reglements/store',[AdminController::class,'storeReglement'])->middleware('auth','admin');
Route::post('/admin/reglements/update',[AdminController::class,'updateReglement'])->middleware('auth','admin');
Route::get('/admin/reglements/delete/{id}',[AdminController::class,'deleteReglement'])->middleware('auth','admin');


#route contact
Route::get('/user/contact',[ClientController::class,'contact']);
Route::post('/user/contact/store',[ClientController::class,'storeContact']);

Route::get('/admin/contacts',[AdminController::class,'contact'])->middleware('auth','admin');
Route::get('/admin/contacts/delete/{id}',[AdminController::class,'delete'])->middleware('auth','admin');




