<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Model\Post;
//eloquent db
Route::get('readeloquent', function () {
 $posts=Post::all();
 foreach ($posts as $post) {
     echo $post->id . " " . $post->title ." " .$post->content ."</br>";
 }
});
Route::get('cretemass', function () {
    Post::create(['title'=>'this is mass assignment',
                    'content'=>'this is content' ]);
    echo 'mass assignment is ok';
});
Route::get('eloquent-update', function () {
     $post=Post::find(1);
     $post->title='this is updated first title';
     $post->content='this is updated content';
     $post->save();
     echo 'update is ok';
});
Route::get('eloquent-insert', function () {
    $post =new Post;
    $post->title='This is the first insert of eloquent';
    $post->content='this is content';
    $post->save();
});

//raw db queries
Route::get('delete', function () {
 $u=DB::delete('delete from users where id = ?', ['4']);
 return "delete user" .$u;
});
Route::get('update', function () {
    DB::update('update users set email = "reaksmey@puthisastra.edu.kh"
                where id = ?', [5]);
             echo 'update is ok';
});
Route::get('insert', function () {
    DB::insert('insert into users ( name, email, password)
            values (?,?, ?)', ['Dakhen', 'Dakhen@gmail.com', bcrypt('12345')]);
    echo 'insert is done';
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('selectdb', 'HomeController@selectDB');
Route::get('insertDB', 'HomeController@insertDB');
Route::get('inserteloquent', 'HomeController@inserteloquent');
