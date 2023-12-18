<?php

namespace App\Http\Controllers;
use App\Models\tables1;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Nette\Utils\Paginator;
class testController extends Controller
{
    public function index()
    {
        $tables = tables1::paginate(3);
        return (['tables' => $tables]);
    }
    public function show(string $test , string $id): RedirectResponse | tables1
    {
        $table = tables1::find($id);
        if($table ->test != $test){
            return to_route('blog.show', ['test'=> $table->test, 'is'=> $table ->$id]);
        }
        return $table;
    }

}