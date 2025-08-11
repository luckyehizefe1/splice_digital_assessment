<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;


Route::post('/create', [FeedbackController::class, 'create']);