<?php
namespace App\Models\Components;

use Illuminate\View\Component;

class Card extends Component
{
    
    public $data;
    
    
    public function __construct($data){
        $this->data = $data;
    }
    
    public function render()
    {
        return view('components.card');
    }

}

