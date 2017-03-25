<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 8/19/2016
 * Time: 6:00 PM
 */

namespace App\Http\Controllers;


use App\BaseClass\ISinhvien;
use App\Events\SomeEvent;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
class MyController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function test()
    {
        $data=["name"=>'vanhung'];
        return view('my.index')->with("data",$data);
    }

    public function save()
    {
        try
        {
            $messages = [
                'password.required' => 'We need to know your e-mail address!',
            ];


            $validator = Validator::make($this->request->all(), [
                "password"=>"size:10|required"
            ],$messages);


            if ($validator->fails()) {

                $validator->getMessageBag()->add('password', 'Password wrong');
                return back()->withErrors($validator)->withInput();
            }

            DB::insert('insert into sinhvien(email,password) VALUES (??,?)',[$this->request['email'],$this->request['password']]);
        }catch(\Exception $e)
        {
            return parent::error();
        }



    }
    public function getFile(ISinhvien $s)
    {
        $s->doSomething();
        //download
        return response()->download(public_path().'/file/larasign-sample.pdf');
        //display on webbrower
//        return response()->file(public_path().'/file/larasign-sample.pdf');
    }

	public function event(){

		//emit event
		event(new SomeEvent());
	}

    public function asset(){
        return asset('file/Desert.jpg');
    }

    public function storage(){

        $handler=fopen("wfio://".storage_path('/年間予定表/index.txt'),'r');
        $content=fread($handler,filesize("wfio://".storage_path('/年間予定表/index.txt')));
       $content= file_get_contents("wfio://".storage_path('/年間予定表/index.txt'));

    }
}