<?php

/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 9/13/2016
 * Time: 6:49 PM
 */
namespace App\Http\ViewComposers;
use Illuminate\View\View;

class ProfileComposer
{
    public function compose(View $view)
    {
        $view->with('count', 'fsdfsdds');
    }
}