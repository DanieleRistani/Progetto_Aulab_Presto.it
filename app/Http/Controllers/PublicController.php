<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PublicController extends Controller
{
    public function home(){
        $categories=Category::all();
        return view('welcome',compact('categories'));
    }

    public function setLanguage($lang){
       App::setLocale($lang);
       session()->put('locale',$lang);
       return redirect()->back();
    }

    public function articleCreate(){
        return view('article.create');
    }
    public function articleShow(Article $article){

         
        $totalReviewsSeller =  Review::where('seller_id', $article->user_id)->get();
        return view('article.show',compact('article','totalReviewsSeller'));
    }

    public function articleCategoryShow(Category $category){

        return view('article.showCategory',compact('category'));

    }
    public function articlesIndex(){

        return view('article.showIndex');

    }
    public function articlesSearch(Request $request){

        $articles=Article::search($request->searched)->where('is_accepted', true)->get();
        
        return view('article.searchArticles',compact('articles', 'request'));

    }

    public function profilePage(){

        return view('profile.profile');
    }

    public function passwordDimenticata(){

        return view('auth.forgot-password');
    }
    
    public function showSelleProfile($article){
        
        $seller=User::where('id',$article)->first();
        return view('profile.seller-profile',compact('seller'));
    }
    
}
