<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FormJiridiqueController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [Controller::class, "dashboard"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("login-register", "App\Http\Controllers\SocialiteController@loginRegister");


Route::get("redirect/{provider}", "App\Http\Controllers\SocialiteController@redirect")->name('socialite.redirect');

Route::get("callback/{provider}", "App\Http\Controllers\SocialiteController@callback")->name('socialite.callback');

Route::resource("clients", ClientController::class);

Route::resource("factures", FactureController::class);

Route::resource('/profile', ProfileController::class);

Route::get('/pdf/{id_facture}', [PdfController::class, "generatePDF"]);

Route::get('/action', [AjaxController::class, 'action'])->name('action');

Route::get('/statut/{id}', [Controller::class, "ChangeStatut"]);

Route::resource("/form", FormJiridiqueController::class);

Route::get('/facture/{idc}', [Controller::class, "Envoyer_ClientAfacture"]);

Route::get('/search_facture', [Controller::class, "search_facture"]);

Route::get('/send/{id}', [EmailController::class, 'index']);

Route::get('/test',[FactureController::class,"Recherche"]);
