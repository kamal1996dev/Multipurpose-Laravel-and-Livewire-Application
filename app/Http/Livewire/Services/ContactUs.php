<?php

namespace App\Http\Livewire\Services;

use Illuminate\Queue\Listener;
use Livewire\Component;

class ContactUs extends Component
{
    public $student=['message'=>''];
    public $num1 ;
    public $num2 ;
    public $result;
    public $msg;
    protected $listeners = ['successMessage' => 'msg'];


    public function add(){
        $this->result = $this->num1 + $this->num2;
        $this->emit('successMessage');

    }

    public function msg(){
        $this->msg = "Successfully Added";
    }
    public function render()
    {
        return view('livewire.services.contact-us');
    }
}
