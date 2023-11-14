<?php

use Illuminate\Support\Facades\Route;

Route::get('/articles/{articleId}/preview', [\App\Http\Controllers\ArticleController::class, 'preview']);
