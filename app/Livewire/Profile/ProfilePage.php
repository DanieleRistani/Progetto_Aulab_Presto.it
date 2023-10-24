<?php

namespace App\Livewire\Profile;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfilePage extends Component
{

    use WithFileUploads;

    public $showModificaProfilo = false;

    public $userDescription;
    public $actual_image;
    public $temporary_image;
    public $image;

    protected $rules = [
        'userDescription' => 'min:5|max:1500',
        'image' => 'image|max:3096',
    ];

    public function updatedTemporaryImage(){
        
        if($this->validate(['temporary_image' => 'image|max:3096'])){
            $this->image = $this->temporary_image;
        }
    }

    
    public function uploadProfileImageAndDesc()
    {
            $this->actual_image = auth()->user()->image;

            $this->validate(['image' => 'image|max:3096',]);

            $filename = $this->image->getClientOriginalName();

            if($this->image){
                Storage::delete('/public/' . $this->actual_image);
            }

            $this->image->storeAs('profileImages',$filename,'public');
            Auth::user()->update(
                ['image'=> ($this->image == null) ? Auth::user()->image : 'profileImages/'. $filename]);

               
            
        return to_route('profilo')->with('updatedProfileImage', 'Profilo modificato con successo!');
    }
    public function uploadProfileDescription(){
        $this->validate([
            'userDescription' => 'min:5|max:1500',
        ]);
        
        Auth::user()->update([
            'description' => $this->userDescription
        ]);
        return to_route('profilo')->with('updatedDescription', 'Profilo modificato con successo!');

    }
    public function createStar($average)
    {

        $final = '';
        $string = strval($average);

        if (strlen($string) > 1) {
            for ($i = 0; $i < floor($average); $i++) {
                $final .= "<i class='fa-solid fa-star text-sec fa-2x'></i>";
            }

            $final .="<i class='fa-regular fa-star-half-stroke text-sec fa-2x'></i>";

            for ($i = 0; $i < (5 - ceil($average)); $i++) {
                $final .= "<i class='fa-regular fa-star text-sec fa-2x'></i>";
            }
        } else {
            for ($i = 0; $i < $average; $i++) {
                $final .= "<i class='fa-solid fa-star text-sec fa-2x'></i>";
            }

            for ($i = 0; $i < 5 - $average; $i++) {
                $final .= "<i class='fa-regular fa-star fa-2x'></i>";
            }
        }

        echo $final;
    }

    public function renderModificaProfilo(){
        if($this->showModificaProfilo == false){
            $this->showModificaProfilo = true;
        }else{
            $this->showModificaProfilo = false;
        }
    }

    public function render()
    {
        $user = auth()->user(); 
        $totalReviewsSeller =  Review::where('seller_id', $user->id)->get();
        return view('livewire.profile.profile-page', compact('user','totalReviewsSeller'));
    }
}
