<?php

namespace App\Livewire;

use Livewire\Component;

class ShowArticle extends Component
{
    
    public  $totalReviewsSeller;
    public $article;
    
    
    public function createStar($average)
    {

        $final = '';
        $string = strval($average);

        if (strlen($string) > 1) {
            for ($i = 0; $i < floor($average); $i++) {
                $final .= "<i class='fa-solid fa-star text-sec fs-5'></i>";
            }

            $final .="<i class='fa-regular fa-star-half-stroke text-sec fs-5'></i>";

            for ($i = 0; $i < (5 - ceil($average)); $i++) {
                $final .= "<i class='fa-regular fa-star text-sec fs-5'></i>";
            }
        } else {
            for ($i = 0; $i < $average; $i++) {
                $final .= "<i class='fa-solid fa-star text-sec fs-5'></i>";
            }

            for ($i = 0; $i < 5 - $average; $i++) {
                $final .= "<i class='fa-regular fa-star fs-5'></i>";
            }
        }

        echo $final;
    }

    
    
    
    public function render()
    {    $article=$this->article;
         $reviewsSeller=$this->totalReviewsSeller;
        return view('livewire.show-article',compact('reviewsSeller','article'));
    }
}
