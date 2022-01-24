<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserEmailController;

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

Route::get('/',  [UserEmailController::class, 'matchUserEmails']);

Route::get('/get-json-data', function () {
    $path = storage_path() . "/app/public/email_names.json";
    $json = json_decode(file_get_contents($path), true);
    return $json;
});
