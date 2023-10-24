<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesIndex extends Component
{

    use WithPagination;
    


    public $checkFilterPriceUp = false;
    public $checkFilterPriceDown = false;
    public $checkFilterRecent = false;
    public $checkFilterLatest = false;


    public function filterPriceUp(){
        $this->checkFilterPriceUp = true;
        $this->checkFilterPriceDown = false;
        $this->checkFilterRecent = false;
        $this->checkFilterLatest = false;
    }

    public function filterPriceDown(){
        $this->checkFilterPriceUp = false;
        $this->checkFilterPriceDown = true;
        $this->checkFilterRecent = false;
        $this->checkFilterLatest = false;
    }

    public function filterRecent(){
        $this->checkFilterPriceUp = false;
        $this->checkFilterPriceDown = false;
        $this->checkFilterRecent = true;
        $this->checkFilterLatest = false;
    }

    public function filterLatest(){
        $this->checkFilterPriceUp = false;
        $this->checkFilterPriceDown = false;
        $this->checkFilterRecent = false;
        $this->checkFilterLatest = true;
    }
    
    
    public function render()
    {
        

        if($this->checkFilterPriceUp){
           $articles=Article::where('is_accepted', true)->orderBy('price','desc')->paginate(9);
        }elseif($this->checkFilterPriceDown){
           $articles=Article::where('is_accepted', true)->orderBy('price','asc')->paginate(9);

        }elseif($this->checkFilterRecent){
           $articles=Article::where('is_accepted', true)->orderBy('created_at','desc')->paginate(9);

        }elseif($this->checkFilterLatest){
           $articles=Article::where('is_accepted', true)->orderBy('created_at','asc')->paginate(9);

        }else{
            $articles=Article::where('is_accepted', true)->paginate(9);
        }

        

        return view('livewire.articles-index', compact('articles'));
    }


   
}
