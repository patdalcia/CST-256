<?php
namespace App\Models;

use Illuminate\Support\Facades\Log;

class Logger implements LoggerInterface
{

    public function warn($message)
    { Log::warning($message);}

    public function debug($message)
    { Log::debug($message);}

    public function error($message)
    { Log::error($message);}

    public function info($message)
    { Log::info($message);}
}

