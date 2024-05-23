<?php

namespace App\Livewire;

use Livewire\Component;

class CompanyInfo extends Component
{
	public $userData;
    private $userInfo;
    
	public function mount($userData, $userInfo)
    {
        $this->userData = $userData;
        $this->userInfo = $userInfo;
    }

    public function getUserInfo()
    {
        return $this->userInfo;
    }
	
    public function render()
    {
        return view('livewire.company-info');
    }
}
