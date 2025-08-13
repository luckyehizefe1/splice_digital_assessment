<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;


Route::post('/create', [FeedbackController::class, 'create']);
Route::get('/', [FeedbackController::class, 'feedbacks']);
Route::get('/{feedbackId}', [FeedbackController::class, 'feedback']);
