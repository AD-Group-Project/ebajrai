<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $address;
    public $image;
    public $newimage;

    public function mount()
    {   
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->profile->phone;
        $this->address = $user->profile->address;
        $this->image = $user->profile->image;
    }

    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        if($this->newimage)
        {
            if($this->image)
            {
                unlink('images/profile/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('profile',$imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->phone = $this->mobile;
        $user->profile->address = $this->address;
        $user->profile->save();
        session()->flash('message','Profile has been updated succesfully!');
    }

    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
