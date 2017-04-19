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
use Symfony\Component\HttpFoundation\File\File;

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

    public function downloadJapaneseFile()
    {
        $my_file=new File(public_path('file/vanhung.txt'));
//        return response()->download(public_path('どら トモデル プロ)

        $out = fopen('php://output', 'wb');
        $file = fopen($my_file->getPathname(), 'rb');

        stream_copy_to_stream($file, $out, $my_file->getSize(), 0);
        fclose($out);
        fclose($file);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'."vanhung.txt".'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . $my_file->getSize());
        exit;
    }

	public function event(){

		//emit event
		event(new SomeEvent());
	}

    public function asset(){
        return asset('file/Desert.jpg');
    }

    public function storage(){

        $path='どら トモデル プロファイル とセマンティック めよう';
        $file_name="どら トモデル プロファイル とセマンティック めよう.txt";
        if(!file_exists('wfio://'.storage_path($path))){
            mkdir('wfio://'.storage_path($path), 0777, true);
        }
        $fullpath=storage_path($path.DIRECTORY_SEPARATOR.$file_name);
        $myfile = fopen('wfio://'.$fullpath, "w+") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);
//       Storage::put('はじめまして.txt','vanhung');
    }
}