<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 8/19/2016
 * Time: 6:00 PM
 */

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;

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

    public function upload(){
        return view('upload.index');
    }

    public function doUpload(Request $request){

        try{
            $this->validate($request, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images'), $imageName);
            $file=$request->file('file');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function request1(){
        sleep(10);
        return json_encode(['data'=>'request1']);
    }
    public function request2(){
        return json_encode(['data'=>'request2']);
    }

    public function test(){
        return view('ajax_multi_request.index');
    }
}