<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'marossi@email.com',
             'password'=> 'password',
             'is_revisor'=>'1',
             'description'=>'Sono un revisore del sito piacere di conoscervi',
        ]);

        $categories = [
            $a=['name'=>'Veicoli','img'=>'public/imgCategory/Veicoli.png'],
            $b=['name'=>'Mobiles','img'=>'public/imgCategory/Mobiles.png'],
            $c=['name'=>'Elettronica','img'=>'public/imgCategory/Elettronica.png'],
            $d=['name'=>'Arredamento','img'=>'public/imgCategory/Arredamento.png'],
            $e=['name'=>'Lavoro','img'=>'public/imgCategory/Lavoro.png',],
            $f=['name'=>'Immobiliare','img'=>'public/imgCategory/Immobiliare.png'],
            $g=['name'=>'Servizi','img'=>'public/imgCategory/Servizi.png'],
            $h=['name'=>'Animali','img'=>'public/imgCategory/Animali.png'],
            $i=['name'=>'Moda','img'=>'public/imgCategory/Moda.png'],
            $l=['name'=>'Bambini','img'=>'public/imgCategory/Bambini.png']
        ];

        foreach($categories as $category){
            Category::create([
                'name' =>$category['name'],
                'img' =>$category['img']
            ]);
        }

      
    }
}

