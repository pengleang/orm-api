<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
      $results= DB::select('select * from users where id = ?', [2]);
      //return $results;
      foreach ($results as $result  ) {
         echo $result->name ."  " .$result->email;
      }
    }
    public function selectDB(){
        $results = DB::select('select * from users');
        //return $results;
        foreach ($results as $result) {
            echo $result->name . "  " . $result->email ."</br>";
        }
    }
    public function insertDB(){
        DB::insert('insert into users ( name, email, password)
            values (?,?, ?)', ['Reaksmey', 'Reaksmey@gmail.com', bcrypt('12345')]);
            echo "insert is ok";
    }
    public function inserteloquent(){
        $post = new Post;
        $post->title = 'This is the second insert of eloquent';
        $post->content = 'this is second content';
        $post->save();
    }
}
