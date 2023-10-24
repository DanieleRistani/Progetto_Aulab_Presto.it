<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Review;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeSwiper extends Component
{

   
   
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
       
         $articleAccepted = Article::where('is_accepted', true)->limit(5)->get();
      
        
        if($articleAccepted->count() == 1){
            
            $categories=Category::all();

           
            $article1=Article::orderBy('id','DESC')->where('is_accepted', true)->first();
            $seller1=User::where('id',  $article1->user->id)->first();
            $totalReviewsSeller1=Review::where('seller_id', $seller1->id)->get();

            return view('livewire.home-swiper', compact('categories','totalReviewsSeller1','article1'));


        }elseif($articleAccepted->count() == 2){

            $categories=Category::all();

           
            $article1=Article::orderBy('id','DESC')->where('is_accepted', true)->first();
            $seller1=User::where('id',  $article1->user->id)->first();
            $totalReviewsSeller1=Review::where('seller_id', $seller1->id)->get();


            $article2= Article::orderBy('id','DESC')->limit(2)->where('is_accepted', true)->skip(1)->first();
            $seller2=User::where('id', $article2->user->id)->first();
            $totalReviewsSeller2=Review::where('seller_id', $seller2->id)->get();

            return view('livewire.home-swiper', compact('categories','totalReviewsSeller2','article2','totalReviewsSeller1','article1'));
            

            
        } elseif($articleAccepted->count() == 3){

            $categories=Category::all();

            $article1=Article::orderBy('id','DESC')->where('is_accepted', true)->first();
            $seller1=User::where('id',  $article1->user->id)->first();
            $totalReviewsSeller1=Review::where('seller_id', $seller1->id)->get();


            $article2= Article::orderBy('id','DESC')->limit(2)->where('is_accepted', true)->skip(1)->first();
            $seller2=User::where('id', $article2->user->id)->first();
            $totalReviewsSeller2=Review::where('seller_id', $seller2->id)->get();

            $article3= Article::orderBy('id','DESC')->limit(3)->where('is_accepted', true)->skip(2)->first();
            $seller3=User::where('id', $article3->user->id)->first();
            $totalReviewsSeller3=Review::where('seller_id', $seller3->id)->get();

            return view('livewire.home-swiper', compact('categories','totalReviewsSeller3','article3','totalReviewsSeller2','article2','totalReviewsSeller1','article1'));



        }elseif($articleAccepted->count() == 4){

            $categories=Category::all();

            $article1=Article::orderBy('id','DESC')->where('is_accepted', true)->first();
            $seller1=User::where('id',  $article1->user->id)->first();
            $totalReviewsSeller1=Review::where('seller_id', $seller1->id)->get();


            $article2= Article::orderBy('id','DESC')->limit(2)->where('is_accepted', true)->skip(1)->first();
            $seller2=User::where('id', $article2->user->id)->first();
            $totalReviewsSeller2=Review::where('seller_id', $seller2->id)->get();

            $article3= Article::orderBy('id','DESC')->limit(3)->where('is_accepted', true)->skip(2)->first();
            $seller3=User::where('id', $article3->user->id)->first();
            $totalReviewsSeller3=Review::where('seller_id', $seller3->id)->get();

            $article4= Article::orderBy('id','DESC')->limit(4)->where('is_accepted', true)->skip(3)->first();
            $seller4=User::where('id', $article4->user->id)->first();
            $totalReviewsSeller4=Review::where('seller_id', $seller4->id)->get();

            return view('livewire.home-swiper', compact('categories','totalReviewsSeller4','article4','totalReviewsSeller3','article3','totalReviewsSeller2','article2','totalReviewsSeller1','article1'));


        }elseif($articleAccepted->count() == 5){

            $categories=Category::all();

            $article1=Article::orderBy('id','DESC')->where('is_accepted', true)->first();
            $seller1=User::where('id',  $article1->user->id)->first();
            $totalReviewsSeller1=Review::where('seller_id', $seller1->id)->get();

            
            $article2= Article::orderBy('id','DESC')->limit(2)->where('is_accepted', true)->skip(1)->first();
            $seller2=User::where('id', $article2->user->id)->first();
            $totalReviewsSeller2=Review::where('seller_id', $seller2->id)->get();

            $article3= Article::orderBy('id','DESC')->limit(3)->where('is_accepted', true)->skip(2)->first();
            $seller3=User::where('id', $article3->user->id)->first();
            $totalReviewsSeller3=Review::where('seller_id', $seller3->id)->get();

            $article4= Article::orderBy('id','DESC')->limit(4)->where('is_accepted', true)->skip(3)->first();
            $seller4=User::where('id', $article4->user->id)->first();
            $totalReviewsSeller4=Review::where('seller_id', $seller4->id)->get();

            $article5= Article::orderBy('id','DESC')->limit(5)->where('is_accepted', true)->skip(4)->first();
            $seller5=User::where('id', $article5->user->id)->first();
            $totalReviewsSeller5=Review::where('seller_id', $seller5->id)->get();

            return view('livewire.home-swiper', compact('categories','totalReviewsSeller5','article5','totalReviewsSeller4','article4','totalReviewsSeller3','article3','totalReviewsSeller2','article2','totalReviewsSeller1','article1'));

        }else{
            $categories=Category::all();

            return view('livewire.home-swiper', compact('categories'));
        }
        
        
       
    }
}
