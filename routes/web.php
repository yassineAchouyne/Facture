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

Route::get('/', [Controller::class, "dashboard"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("login-register", "App\Http\Controllers\SocialiteController@loginRegister");

// La redirection vers le provider
Route::get("redirect/{provider}", "App\Http\Controllers\SocialiteController@redirect")->name('socialite.redirect');

// Le callback du provider
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

Route::get('/test', function () {
// try{


    $url = public_path("pdf.pdf");
   
    $im = new \Imagick();
    $im->readImage($url);
// }catch(\Exception $err){
//     return $err->getMessage();
// }

    // $imagick->setImageIndex(0);
    // $imagick->resizeImage(400, 400, Imagick::FILTER_LANCZOS, 1, 1);
    // $imagick->setImageFormat('png');
    // $file_name =  '_' . time() . ".png";
    // $imagick->writeImage(public_path("storage/" . 'readingfile/images' . "/" . $file_name));
    // $pathimage = 'readingfile/images/' . $file_name;
});
