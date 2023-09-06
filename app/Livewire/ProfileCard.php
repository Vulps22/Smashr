<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileCard extends Component
{

	public $profile;
	public $picture_url;
	public $using_default = true;

	public function mount($user_id)
	{
		$user =  User::find($user_id);
		$this->profile = $user->profile;
		if( $this->profile->primaryImage()->filename && Storage::exists($this->profile->primaryImage()->filename)) 
		{
			$this->picture_url = Storage::url($user->profile->primaryImage()->filename);
			$this->using_default = false;
		}
		else $this->picture_url = Storage::url('images/default.png');

	}

	public function render()
	{
		return view('livewire.profile-card');
	}
}
