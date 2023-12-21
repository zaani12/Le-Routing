<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Nette\Utils\Paginator;
use Illuminate\View\View;
use Illuminate\Support\Facades\validator;
use  App\Http\Requests\TestFilterRequest;
class testController extends Controller
{
    public function index() {
    //    $validator = validator::make([
    //         "test"=> "ffffsd",
    //         "content"=> "cccccfdr",
    //     ],
    //      [
    //         "test"=> "required |min:4 ",
    //         "content"=> "required |min:4 ",

    //     ]
    //     // [
    //     //     "tset"=> [Rule::unique("tables")->ignore('2')],
    //     // ]
    // );
        // dd($validator->fails()); // return true or fals 
        // dd($validator->errors()); // return array of error messages 
        // dd($validator->validated());
        // $tables = tables1::paginate(3);
        // return (['tables' => $tables]);
        $table = post::paginate(1);
        // dd($table);
        return view('test.index',[
            'tables' => $table
        ]);
        

    }
  
    public function show(string $test , string $id): RedirectResponse | post
    {
        $table =post::find($id);
        if($table->test != $test){
            return to_route('blog.show', ['test'=> $table->test, 'id'=> $table ->id]);
        }
        return $table;
    }

}