<?php

namespace App\Http\Controllers;

use App\Helpers\DataManipulation;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseDataValidator;
use App\Models\Courses;
use App\Repositories\ResponseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CoursesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/courses",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */

    /**
     * Get all courses
     * 
     * @return arr An array list with all courses if successful, else an empty array
     */
    public static function getAllCourses()
    {
        try {
            $courses_data = Courses::getAllCourses();
        } catch (\Exception $e) {
            $response = responseRepository::ResponseInternalError();
            return $response;
        }

        $response = responseRepository::ResponseSuccessWithData($courses_data, 'Courses fetched successfully');

        return $response;
    }


    /**
     * Get a course by course id
     * 
     * @param int $course_id The course id
     * 
     * @return arr           The course's data if successful, else the corresponding error
     */
    public function getCourseByCourseId($course_id)
    {
        $validator = Validator::make(['id' => $course_id], CourseDataValidator::courseIdValidation());
        if ($validator->fails()) {
            $response = responseRepository::ResponseBadRequest($validator->errors(), 'Validation Error');
            return $response;
        }

        try {
            $course_data = Courses::getCourseByCourseId($course_id);
        } catch (\Exception $e) {
            $response = responseRepository::ResponseInternalError();
            return $response;
        }

        if (!$course_data) {
            $response = responseRepository::ResponseNotFound('Course with id ' . $course_id . ' does not exist');
            return $response;
        }

        $response = responseRepository::ResponseSuccessWithData($course_data, 'Course with id ' . $course_id . ' fetched successfully');
        return $response;
    }


    /**
     * Create course
     * 
     * @param arr $data The payload data
     * 
     * @return arr      The course's data if successful, else the corresponding error
     */
    public function createCourse(Request $request)
    {
        $request_payload = $request->input();
        $cleanse_payload = DataManipulation::removeExtraData(Courses::dataWhitelist(), $request_payload);

        $validate_data = Validator::make($cleanse_payload, CourseDataValidator::createFormValidation());
        if ($validate_data->fails()) {
            $response = responseRepository::ResponseBadRequest($validate_data->errors(), 'Validation Error');
            return $response;
        }

        try {
            $new_course = Courses::createCourse($cleanse_payload);
        } catch (\Exception $e) {
            $response = responseRepository::ResponseInternalError();
            return $response;
        }

        $response = responseRepository::ResponseSuccessfullyCreated('New course successfully created');
        return $response;
    }


    /**
     * Update course's data by course id
     * 
     * @param int $course_id The course id
     * 
     * @return arr           A successful message, else the corresponding error
     */
    public function updateCourseByCourseId(Request $request, $course_id)
    {
        $request_payload = $request->input();
        $cleanse_payload = DataManipulation::removeExtraData(Courses::dataWhitelist(), $request_payload);

        $validate_data = Validator::make($cleanse_payload, CourseDataValidator::updateFormValidation());
        if ($validate_data->fails()) {
            $response = responseRepository::ResponseBadRequest($validate_data->errors(), 'Validation Error');
            return $response;
        }

        $validator = Validator::make(['id' => $course_id], CourseDataValidator::courseIdValidation());
        if ($validator->fails()) {
            $response = responseRepository::ResponseBadRequest($validator->errors(), 'Validation Error');
            return $response;
        }

        try {
            $course_data = Courses::getCourseByCourseId($course_id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        if (!$course_data) {
            $response = responseRepository::ResponseNotFound('Course with id ' . $course_id . ' does not exist');
            return $response;
        }

        try {
            $update_course = Courses::updateCourseByCourseId($course_id, $cleanse_payload);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $response = responseRepository::ResponseSuccessWithoutData('Course with id: ' . $course_id . ' successfully updated');
        return $response;
    }


    /**
     * Delete course by course id
     * 
     * @param int $course_id The course id
     * 
     * @return arr           A successful message, else the corresponding error
     */
    public function deleteCourseByCourseId($course_id)
    {
        $validator = Validator::make(['id' => $course_id], CourseDataValidator::courseIdValidation());
        if ($validator->fails()) {
            $response = responseRepository::ResponseBadRequest($validator->errors(), 'Validation Error');
            return $response;
        }

        try {
            $course_data = Courses::getCourseByCourseId($course_id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        if (!$course_data) {
            $response = responseRepository::ResponseNotFound('Course with id ' . $course_id . ' does not exist');
            return $response;
        }

        try {
            $deleted_course = Courses::deleteCourseByCourseId($course_id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }


        $response = responseRepository::ResponseSuccessWithoutData('Course with id: ' . $course_id . ' successfully deleted');
        return $response;
    }
}
