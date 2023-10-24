<?php

namespace App\Livewire;


use App\Models\Review;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StarsReview extends Component
{
    
    public $seller;
    public function setReviewSeller($n)
    {
        if(auth()->user()){
            Review::create([
                'user_id' => Auth::user()->id,
                'seller_id' => $this->seller->id,
                'stars' => $n,
            ]);
        }else{
            return to_route('login')->with('reviewLogin', 'Accedi per lasciare una recensione!');
        }
        return to_route('showSelleProfile', $this->seller)->with('updatedReview', 'Recensione aggiunta con successo!');
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




    public function render()
    {
        $articles=Article::where('user_id', $this->seller->id)->where('is_accepted', true)->get();
        $totalReviewsSeller =  Review::where('seller_id', $this->seller->id)->get();
        return view('livewire.stars-review', compact('totalReviewsSeller', 'articles'));
    }
}
