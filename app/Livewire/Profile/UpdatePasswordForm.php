<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordForm extends Component
{
    public $password;
    public $repeatnuovaPassword;
    public $actualPassword;

    protected $rules = [
        'password' => 'required',
        'repeatnuovaPassword' => 'required',
        'actualPassword' => 'required'
    ];

    protected $messages = [
        'password.required' => 'Inserisci la nuova password',
        'repeatnuovaPassword.required' => "Inserisci ancora la nuova password",
        'actualPassword.required' => 'Inserisci la tua password attuale'
    ];


    public function updatePassword(){

        $this->validate();

        $user = Auth::user();

        if(Hash::check($this->actualPassword, $user->password) && $this->password == $this->repeatnuovaPassword)
        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);
        else{
            return to_route('profilo')->with('passwordErrata', 'Password errata oppure le nuove password non coincidono');
        }

        return to_route('profilo')->with('profileUpdated', 'Password aggiornata con successo');

    }

    public function render()
    {
        return view('livewire.profile.update-password-form');
    }
}
