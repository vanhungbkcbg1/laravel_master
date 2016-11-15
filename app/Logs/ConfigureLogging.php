<?php
/**
 * Created by PhpStorm.
 * User: hungnv
 * Date: 11/15/2016
 * Time: 9:45 PM
 */

namespace App\Logs;

use Illuminate\Foundation\Bootstrap\ConfigureLogging as IlluminateConfigureLogging;
use Illuminate\Log\Writer;
use Illuminate\Contracts\Foundation\Application;
class ConfigureLogging extends IlluminateConfigureLogging
{
    protected function configureSingleHandler(Application $app, Writer $log)
    {
        $log->useFiles($app->storagePath().'/logs/foo.log');
    }

    protected function configureDailyHandler(Application $app, Writer $log)
    {
        $log->useDailyFiles(
            $app->storagePath().'/logs/foo.log',
            $app->make('config')->get('app.log_max_files', 5)
        );
    }
}