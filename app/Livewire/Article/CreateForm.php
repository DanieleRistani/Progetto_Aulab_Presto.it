<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\AddWatermark;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $category_id;
    public $description;

    public $article;
    public $temporary_images;
    public $images = [];
    public $image;

    protected $rules=[
        'title'=>'required|min:3',
        'price'=>'required|min:1',
        'description'=>'required|min:5|max:1500',
        'category_id'=>'required',
        'images.*' => 'image|max:2048|required',
        'images' =>'max:5|required',
        'temporary_images.*' => 'image|max:2048|required',
        'temporary_images' =>'max:5|required'
    ];

    protected $messages = [
        'title.required' => 'Il titolo non può essere vuoto',
        'title.min' => 'Il titolo deve avere almeno 3 caratteri',
        'price.required' => 'Il prezzo non può essere vuoto',
        'price.min' => 'Il prezzo deve avere almeno 1 cifra',
        'description.required' => 'La descrizione non può essere vuota',
        'description.min' => 'La descrizione deve avere almeno 5 caratteri',
        'description.max' => 'La descrizione deve avere al massimo 1500 caratteri',
        'category_id.required' => 'Il campo categoria non può essere vuoto',

        'temporary_images.*.required' => 'L\'immagine non può essere vuota',
        'temporary_images.*.max' => 'immagine deve essere al massimo 2MB',
        'temporary_images.max' => 'L\'Non puoi inserire più di 5 immagini ',
        'images.*.required' => 'L\'immagine non può essere vuota',
        'images.*.max' => 'immagine deve essere al massimo 2MB',
        'images.max' => 'L\'Non puoi inserire oltre 5 immagini'
    ];

    public function updatedTemporaryImages(){
        if($this->validate(['temporary_images.*' => 'image|max:2048|required','temporary_images' =>'max:5|required'])){
            $this->images=[];
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
    

   
    public function store ()
    {
       
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'slug'=> Str::of($this->title)->slug('-').'-'.Auth::user()->id
        ]);

        if(count($this->images)){
            foreach($this->images as $image){
               
                $newFileName="articles/{$this->article->id}";
                
                $newImage= $this->article->images()->create([
                    'path' => $image->store($newFileName, 'public')
                ]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,600,600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);

                dispatch(new AddWatermark($newImage->id));

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        return to_route('article.create')->with('articleCreated', 'Articolo inserito con successo in attesa di revisione');
        $this->reset();
        
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.article.create-form',compact('categories'));
    }
    
}

















