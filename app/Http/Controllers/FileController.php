<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 8/19/2016
 * Time: 6:00 PM
 */

namespace App\Http\Controllers;


use App\BaseClass\ISinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class FileController extends Controller
{

    public function view($file)
    {
        return response()->file(storage_path('app/'.$file));
    }
}