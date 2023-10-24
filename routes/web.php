<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [PublicController::class,'home'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/article/create', [PublicController::class,'articleCreate'])->name('article.create');
    Route::get('/lavora-con-noi', [RevisorController::class,'lavoraConNoi'])->name('lavoraConNoi');
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('richiesta.revisore');
    
    Route::get('/profilo', [PublicController::class,'profilePage'])->name('profilo');
});

Route::middleware(['auth', 'isRevisor'])->group(function(){

    Route::get('/revisor/home',[RevisorController::class,'home'])->name('revisor.home');
    Route::patch('/accetta/articolo/{article}',[RevisorController::class,'articleAccept'])->name('revisor.accept.article');
    Route::patch('/declina/articolo/{article}',[RevisorController::class,'articleDecline'])->name('revisor.decline.article');
    Route::patch('/revisiona/articolo/{article}',[RevisorController::class,'revisionArticle'])->name('revisor.revision.article');
});

Route::get('/profilo/venditore/{article}',[PublicController::class,'showSelleProfile'])->name('showSelleProfile');

Route::get('/lingua/{lang}',[PublicController::class,'setLanguage'])->name('setLocalLanguage');

Route::get('/article/show/{article:slug}',[PublicController::class,'articleShow'])->name('article.show');

Route::get('/article/Category/{category:name}',[PublicController::class,'articleCategoryShow'])->name('article.category.show');

Route::get('/articles',[PublicController::class,'articlesIndex'])->name('articles.Index');

Route::get('/articles/searched',[PublicController::class,'articlesSearch'])->name('articles.search');


Route::get('/password-dimenticata',[PublicController::class,'passwordDimenticata'])->name('password.dimenticata');



Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('rendi.revisore');