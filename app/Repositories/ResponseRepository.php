<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class ResponseRepository
{
    /**
     * Bad Request Response - 400
     * 
     * @param object $errors The errors that have occurred
     * 
     * @return Response      Returns the errors data and the corresponding message
     */
    public static function ResponseBadRequest($errors, $message = 'Data is invalid', $status_code = JsonResponse::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status'  => $status_code,
            'message' => $message,
            'errors'  => $errors,
            'data'    => null,
        ], $status_code);
    }


    /**
     * Not Found Response - 404
     * 
     * @param object $errors The errors that have occurred
     * 
     * @return Response      Returns the errors data and the corresponding message
     */
    public static function ResponseNotFound($message = 'Not Found', $status_code = JsonResponse::HTTP_NOT_FOUND)
    {
        return response()->json([
            'status'  => $status_code,
            'message' => $message,
            'data'    => null,
        ], $status_code);
    }


    /**
     * Internal Error - 500
     * 
     * @param object $errors The errors that have occurred
     * 
     * @return Response      Returns the errors data and the corresponding message
     */
    public static function ResponseInternalError($message = 'Internal Server Error', $status_code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'status'  => $status_code,
            'message' => $message,
            'data'    => null,
        ], $status_code);
    }


    /**
     * Successful Response - 200
     *
     * Returns the success data and message if there is any error
     *
     * @param object $data
     * @param string $message
     * @param integer $status_code
     * @return Response
     */
    public static function ResponseSuccess($data = null, $message = "Successful", $status_code = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'status'  => $status_code,
            'message' => $message,
            'errors'  => null,
            'data'    => $data,
        ], $status_code);
    }


    /**
     * Successful Created Response - 201
     *
     * Returns the success data and message if there is any error
     *
     * @param object $data
     * @param string $message
     * @param integer $status_code
     * @return Response
     */
    public static function ResponseSuccessfullyCreated($message = "Successfully Created", $status_code = JsonResponse::HTTP_CREATED)
    {
        return response()->json([
            'status'  => $status_code,
            'message' => $message,
            'errors'  => null,
        ], $status_code);
    }
}
