<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;

/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 2/13/2017
 * Time: 10:12 PM
 */
class AuthController extends  Controller

{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginView = 'admin.auth.login';

    protected $guard = 'admin';

    protected $redirectTo = null;
    protected $redirectAfterLogout=null;

    public function __construct()
    {
        $this->redirectTo = route('admin.home');
        $this->redirectAfterLogout=route('admin.getLogin');
    }
}