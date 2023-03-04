<?php

use App\Http\Controllers\PhonebookController;
use App\Models\User;
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

Route::get('/', [PhonebookController::class, 'index']);

Route::get('/providers/{id}', [PhonebookController::class, 'showProviders']);

Route::get('/subscribers', [PhonebookController::class, 'showSubscribers']);

Route::get('/search', [PhonebookController::class, 'searchSubscriber']);

Route::post('/add-subscriber', [PhonebookController::class, 'storeSubscriber']);

Route::post('/add-provider', [PhonebookController::class, 'storeProvider']);

Route::post('/update-subscriber/{id}', [PhonebookController::class, 'updateSubscriber']);

Route::post('/update-provider/{id}', [PhonebookController::class, 'updateProvider']);

Route::post('/delete-subscriber/{id}', [PhonebookController::class, 'deleteSubscriber']);

Route::post('/delete-provider/{id}', [PhonebookController::class, 'deleteProvider']);