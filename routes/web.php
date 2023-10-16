<?php

use App\Livewire\Counter;
use App\Livewire\Search;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/search-user', Search::class);

});

Route::post('locale/{locale}', function($locale){
    if(!in_array($locale, ['en', 'ms'])) {
        $locale = 'en';
    }

    app()->setLocale($locale);

    return redirect()->back();
});

Route::get('articles', function() {
    // $articles = Article::with('user')->paginate(100);
    $articles = Article::paginate(100);

    echo "<ol>";
    foreach ($articles as $article) {
        echo "<li>$article->topic - ".$article->user->name."</li>";
    }
    echo "</ol>";
});

Route::get('/counter', Counter::class);
