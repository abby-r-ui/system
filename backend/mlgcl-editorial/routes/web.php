<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ReviewerController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('submissions', SubmissionController::class);
Route::post('submissions/{id}/assign', [SubmissionController::class, 'assignReviewers'])->name('submissions.assign');
Route::get('submissions/{id}/report', [SubmissionController::class, 'generateReport'])->name('submissions.report');
Route::resource('reviewers', ReviewerController::class);
Route::get('reviewers/{id}/reviews', [ReviewerController::class, 'reviews'])->name('reviewers.reviews');
