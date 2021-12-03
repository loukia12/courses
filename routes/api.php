<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;


/**
 * Get all courses route
 */
Route::get(
    '/courses',
    [CoursesController::class, 'getAllCourses']
);

/**
 * Get course by course id route
 */
Route::get(
    '/courses/{course_id}',
    [CoursesController::class, 'getCourseByCourseId']
);

/**
 * Create course route
 */
Route::post(
    '/courses',
    [CoursesController::class, 'createCourse']
);

/**
 * Update course by course id route
 */
Route::put(
    '/courses/{course_id}',
    [CoursesController::class, 'updateCourseByCourseId']
);

/**
 * Delete course by course id route
 */
Route::delete(
    '/courses/{course_id}',
    [CoursesController::class, 'deleteCourseByCourseId']
);
