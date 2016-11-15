<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 8/19/2016
 * Time: 6:00 PM
 */

namespace App\Http\Controllers;


use DB;

class FileController extends Controller
{

    public function view($file)
    {
        try
        {
            return response()->file(storage_path('app/'.$file));
        }catch(\Exception $e){
            return parent::error();
        }

    }
}