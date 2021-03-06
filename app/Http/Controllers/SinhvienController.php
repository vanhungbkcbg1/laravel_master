<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 8/19/2016
 * Time: 6:00 PM
 */

namespace App\Http\Controllers;


//use DB;
use Illuminate\Support\Facades\Log;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SinhvienController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
//        $this->middleware('auth');
    }

    public function index()
    {
        try {

            $results=DB::table('sinhvien')->select('id','email','image','password')->paginate(10);
//            test();

            $from=($results->currentPage()-1)*$results->perPage();
            $to=($results->currentPage())*$results->perPage();
            if($results->currentPage()*$results->perPage()>$results->total())
            {
                $to=$to-$results->currentPage()*$results->perPage()+$results->total();
            }


//            $data = DB::select('select * from sinhvien');
            Log::info('this is my log');
            return view('sinhvien.index')->with('data', $results);
        } catch (\Exception $e) {
            parent::error();
        }
    }

    public function create()
    {
        return view('sinhvien.create');
    }

    public function angular(){

        return view('angular.index');
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
            $this->request->session()->flash('message','name');

//            Mail::raw('Text to e-mail', function ($message) {
//                $message->from('vanhungbkcbg2@gmail.com','vanhung');
//                $message->to('vanhungbkcbg1@gmail.com');
//            });

            Mail::send('mail.content',[], function ($message) {
                $message->from('vanhungbkcbg2@gmail.com','vanhung');
                $message->attach(storage_path('app/vanhung.txt'));
                $message->to('vanhungbkcbg1@gmail.com');
            });
            return redirect()->route('sinhvien_list');

        } catch (\Exception $e) {
            parent::error();
        }
    }

    public function getAll()
    {
        $data=DB::table('sinhvien')->get();
        return response()->json($data);
    }

    public function getById($id){
        $data=DB::table('sinhvien')->where('id',$id)->first();
        return response()->json($data);
    }
}