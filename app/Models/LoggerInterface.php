<?php
namespace App\Models;

interface LoggerInterface
{
    public function debug();
    public function info();
    public function warn();
    public function error();
}

