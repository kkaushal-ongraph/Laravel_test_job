<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * 
     * @param type $status True/False
     * @param type $message
     * @return type
     */
    public function jsonResponse($status, $message) {
        return [
            'status' => $status,
            'message' => $message
        ];
    }

    /**
     * Send return response when Ajax call on form submit
     * 
     * @param boolean   $cstatus    This will be true or false.
     * @param string    $curl       This is the page Url where to redirect after form submit successfully.
     * @param string    $cmessage   This is to show message on error.
     * @param array     $cdata      Just in case if you want to send some data in return.
     * @param array     $function      This function will call in javascript like hgphpdev(param) (this is your custom function and param will be your data you send).
     * @return array    This will return all param detail with array.
     * 
     * */
    public function sendResponse($cstatus, $curl = '', $cmessage = '', $cdata = [], $function = '') {
        return [
            'status' => $cstatus,
            'url' => $curl,
            'message' => $cmessage,
            'data' => $cdata,
            'function' => $function
        ];
    }

}
