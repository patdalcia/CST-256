<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoggerInterface;

class LoggingController extends Controller
{
    protected $logger;
    
    public function __construct(LoggerInterface $l){
        $this->logger = $l;
    }
    
    public function index(){
        $logger->info("TESTING");
    }
}
