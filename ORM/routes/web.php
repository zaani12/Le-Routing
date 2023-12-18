<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::prefix('/blog')->name('blog.')->group(function(){
//     Route::get('/',function(Request $request){
// $table = new \App\Models\tables1;
// $table->test = 'mon test2';
// $table->name ='nom tast name 2';
// $table->content = 'my  content 2';
// $table->save();

// return $table;


 
        

//     })->name('index');

// });


Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request) {
        $table = \App\Models\tables1::all(['id' , 'test']);
        dd($table[0]->test);
        return $table;

    })->name('index');
});

Route::get('/{slug}-{id}',function(string $slug, string $id , Request $request){
    return [
        "slug" => $slug,
        "id"=> $id,
        "name" => $request->input("name"),
        
    ];
}
);
Route::get("/", function () {
    return ("welcome");
});