<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Courses extends Model
{
    /**
     * Database configure
     */
    protected $table    = 'courses';
    protected $fillable = ['title', 'description', 'created_at', 'updated_at'];
    public $timestamps  = true;

    use HasFactory;


    /**
     * Get all courses model
     * 
     * @return arr A list with all courses
     */
    public static function getAllCourses()
    {
        $data = Courses::all();

        return $data;
    }


    /**
     * Get a course by course id model
     * 
     * @param $course_id The course id
     * 
     * @return arr       The course's data
     */
    public static function getCourseByCourseId($course_id)
    {
        $data = Courses::firstWhere('id', $course_id);

        return $data;
    }


    /**
     * Create course model
     * 
     * @param  arr $data The course's data
     * 
     * @return bool      True if it's successful, else false
     */
    public static function createCourse($data)
    {
        $result = Courses::insert([
            [
                'title'       => $data['title'],
                'description' => $data['description'],
                'created_at'  => now()
            ]
        ]);

        return $result;
    }


    /**
     * Update course by course id
     * 
     * @param int $course_id The course id
     * @param arr $data      The new course data
     * 
     * @return bool          True if it's successful, else false
     */
    public static function updateCourseByCourseId($course_id, $data)
    {
        $result = Courses::where(
            'id',
            $course_id
        )->update(
            $data
        );

        return $result;
    }


    /**
     * Delete course by course id
     * 
     * @param in $course_id The course id
     * 
     * @return bool         True if it's successful, else false
     */
    public static function deleteCourseByCourseId($course_id)
    {
        $query = Courses::where(
            'id',
            $course_id
        )->delete();

        return $query;
    }


    /**
     * A whitelist with the accepted payload data that are needed for the sql queries
     */
    public static function dataWhitelist()
    {
        $whitelist = [
            'title'       => '',
            'description' => ''
        ];

        return $whitelist;
    }
}
