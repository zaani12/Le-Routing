<?php

namespace App\Http\Controllers;
use App\Models\tables1;
use Illuminate\Http\Request;
use Nette\Utils\Paginator;
use Illuminate\View\View;


class testController extends Controller
{
    public function index() :view{
        // $tables = tables1::paginate(3);
        // return (['tables' => $tables]);
        // dd($request->validated());
        return view('test.index',[
            $tables = tables1::paginate(1),
            'tables' => $tables
        ]);

    }
  
    public function show(string $test , string $id):tables1
    {
        $table =tables1::find($id);
        if($table->test != $test){
            return to_route('blog.show', ['test'=> $table->test, 'id'=> $table ->id]);
        }
        return $table;
    }

}