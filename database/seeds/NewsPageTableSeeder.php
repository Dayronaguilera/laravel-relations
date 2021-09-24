<?php

use App\Article;  // prendo i dati di model 2
use App\Author;// prendo i dati di model 2

use Illuminate\Database\Seeder;
use Faker\Generator as Faker; // usiamo il faker con as gli riadiamo noi un nome 

class NewsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        $imgArticleList = [ // array di img
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgSPWcjcKT2vATMBw_IPz_VyOyGr2ycs6Uyg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0_N_MiMuQ4AZwdn56mg8RAargJ3o6v1zd9Q&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGd98agAnPPRpwtsofMLtcyDtXlaQ8GGffSA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGGxh16rbRePN9z0maOBHFCFrKrhkt0TS75A&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl3YdxvodKsjOli_IC1_hFuW7LPNODV5ZOaQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7xycUkn34W5qPxB36MtWDimoHQbvsXuJRjA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSutfj0I6SweWSHBocE7uhnE0qIAh35XtRSag&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRMabkbCkeMm1vC4LASPD4NkTT6fWfQSbQUg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdgzkFgLWDrHxncKpfCBXvPEao3JQ482Vnkg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRb6ivT9payxb5mtnUfC9Pq6SczD2iLskq3w&usqp=CAU',
        ];
        

        $authorList = [   // array di autori 
            'Andrea Scanzi',
            'Marco Travaglio',
            'Gianluca Di Marzio',
            'Enrico Mentana',
            'Alfredo Pedulla',
        ];

        $authorListID = []; // qui andremo ad inserire i nostri id di author

        foreach($authorList as $author){ // qui Author

            $authorObject = new Author;
            $authorObject->author = $author;
            $authorObject->photo = $faker->imageUrl(150,150 ,'img', true); 
            $authorObject->email = $faker->email();
            $authorObject->save();
            $authorListID[] = $authorObject->id;

        }

        for ($i=0; $i < 20; $i++){
       
            // qui Article
            $article = new Article();
            $article->title = $faker->sentences(1, true);;
            $article->content = $faker->paragraphs(10, true);

            $randImageKey = array_rand($imgArticleList, 1); // estrae una img random
            $image = $imgArticleList[$randImageKey]; // l'assegniamo alla nuova variabile
            $article->image = $image; // la definiamo nel db

            $randAuthorKey = array_rand($authorListID, 1); // estrae una img random
            $authorID = $authorListID[$randAuthorKey]; // l'assegniamo alla nuova variabile
            $article->authors_id = $authorID; // la definiamo nel db

            $article->save();
        }
    }
}
