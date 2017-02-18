<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 2/13/2017
 * Time: 10:36 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return 'AUTHENTICATED IN ' . __METHOD__;
    }
}