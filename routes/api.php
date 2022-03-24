<?php

use Fligno\SimpleStatistics\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('statistics', StatisticsController::class)->only(['show', 'index']);
