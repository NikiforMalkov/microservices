<?php

use App\Http\Controllers\ExampleApiController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/example', [ExampleApiController::class, 'test']);
