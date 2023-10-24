<?php

namespace App\Livewire\Dashboard;

use App\Models\Article;
use Livewire\Component;

class DashboardRevisor extends Component
{
    
    public  $articlesInPending;
    public  $articlesRefused ;
    public  $articlesAccepted;
    

    public $checkArticlesInPending=false;
    public $checkArticlesRefused=false ;
    public $checkArticlesAccepted=false;
    
    
    public function showArticlesInPending(){
        $this->checkArticlesInPending=true;
        $this->checkArticlesRefused=false ;
        $this->checkArticlesAccepted=false;
            


    }
    public function showArticlesAccepted(){
        $this->checkArticlesInPending=false;
        $this->checkArticlesRefused=false ;
        $this->checkArticlesAccepted=true;

        
    }
    public function showArticlesRefused(){

        $this->checkArticlesInPending=false;
        $this->checkArticlesRefused=true;
        $this->checkArticlesAccepted=false;
        
    }




    
    public function render()
    {

        if($this->checkArticlesInPending==true){

            $articles=$this->articlesInPending;

        }elseif($this->checkArticlesRefused==true){
          
           $articles=$this->articlesRefused;

        }elseif($this->checkArticlesAccepted==true){

            $articles=$this->articlesAccepted;

        }else{

             $articles=$this->articlesInPending;
        }

         
         
        
    

        return view('livewire.dashboard.dashboard-revisor',compact('articles'));
    }
}
