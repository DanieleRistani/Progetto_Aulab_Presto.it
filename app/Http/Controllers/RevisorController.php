<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function lavoraConNoi(){
        
        return view('lavoraConNoi');
    }

    public function home()
    {
        $articlesInPending = Article::where('is_accepted', null)->where('user_id','!=',Auth::user()->id)->get();
        $articlesRefused = Article::where('is_accepted', false)->where('user_id','!=',Auth::user()->id)->get();
        $articlesAccepted = Article::where('is_accepted', true)->where('user_id','!=',Auth::user()->id)->get();


        return view('dashboard.home', compact('articlesInPending','articlesRefused','articlesAccepted'));
    }

    public function articleAccept(Article $article){
        $article->setAccepted(true);
        return to_route('revisor.home')->with('articleAccepted', 'Articolo accettato');
    }

    public function articleDecline(Article $article){
        $article->setAccepted(false);
        return to_route('revisor.home')->with('articleRefused', 'Articolo Rifiutato');
    }

    public function revisionArticle(Article $article){
        $article->setAccepted(null);
        return to_route('revisor.home')->with('articleRevision', 'Articolo rimandato in revisione');
    }

    public function becomeRevisor(){
        Mail::to('admin@email.com')->send(new BecomeRevisor(Auth::user()));
        return to_route('lavoraConNoi')->with('revisorRequest', 'Richiesta inviata con successo!');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email'=>$user->email]);

        return to_route('home')->with('revisorDone', 'Utente reso revisore!');
    }


}
