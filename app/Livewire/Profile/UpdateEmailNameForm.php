<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateEmailNameForm extends Component
{

    public $name;
    public $email;
    public $password;

    protected $rules = [
        'email' => '|unique:users',
        'password' => 'required'
    ];

    protected $messages = [
        'email.unique' => "Questa email è già stata utilizzata",
        'password.required' => 'Inserisci la tua password attuale'
    ];

    public function updateProfile(){

        $this->validate();

        $users = User::all();
        $user = Auth::user();

        if(Hash::check($this->password, $user->password))
        Auth::user()->update([
            'name' => ($this->name == null) ? $user->name : $this->name,
            'email' => ($this->email == null) ? $user->email : $this->email,
        ]);
        else{
            return to_route('profilo')->with('passwordErrata', 'Password errata');
        }

        if(User::where('email') == $this->email){
            return to_route('profilo')->with('emailAlreadyExist', 'Questa email è già stata utilizzata');
        }

        return to_route('profilo')->with('profileUpdated', 'Informazioni profilo aggiornate con successo');
    }

    
    public function render()
    {
        return view('livewire.profile.update-email-name-form');
    }
}
