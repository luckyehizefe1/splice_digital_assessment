<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::post('/{feedbackId}/comments', [CommentController::class, 'create']);
Route::get('/', [CommentController::class, 'comments']);
