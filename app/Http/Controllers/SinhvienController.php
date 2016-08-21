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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SinhvienController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        try {

            $data = DB::select('select * from sinhvien');
            return view('sinhvien.index')->with('data', $data);
        } catch (\Exception $e) {
            parent::error();
        }
    }

    public function create()
    {
        return view('sinhvien.create');
    }

    public function save()
    {
        try {
            $rule=[

              "email"=>'email',
                "password"=>'required|size:10',
                'file'=>'file'
            ];
//            $validator=Validator::make($this->request->all(),$rule);
//            if($validator->fails())
//            {
//                return back()->withErrors($validator)->withInput();
//            }


            $file=$this->request->file('file');

            $current_time=time();
            Storage::put($current_time.'_'.$file->getClientOriginalName(),file_get_contents($file));

            $file_name=$current_time.'_'.$file->getClientOriginalName();
            $password=$this->request['password'];
            $email=$this->request['email'];
            DB::insert('insert into sinhvien(email,password,image) VALUES (?,?,?)',[$email,$password,$file_name]);
            return redirect()->route('sinhvien_list');

        } catch (\Exception $e) {
            parent::error();
        }
    }
}