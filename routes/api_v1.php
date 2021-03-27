<?php

use App\Http\Controllers\Api\V1\ParagraphsController;
use Illuminate\Support\Facades\Route;

Route::get('/paragraphs', ParagraphsController::class)->name('api.v1.paragraphs');