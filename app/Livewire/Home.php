<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\UsersInfo;

class Home extends Component
{
	public $userInfo;
	public $user;
	
	public function mount()
	{
		$this->user = auth()->user();
		$userId = $this->user->bind_id;
		
		// Get the account type
		$fetchUser = UsersInfo::where('bind_id', $userId)->first();
		$this->userInfo = $fetchUser;
	}
	
    public function render():View
    {
        return view('livewire.home');
    }
}
