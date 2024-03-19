<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormPostRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller{
    public function create(){
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function store(FormPostRequest $request){
        $post = Post::create($request->validated());
        $post->tags()->sync($request->validated('tags'));
        return redirect()
        ->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
        ->with('success', "l'article a bien été sauvegardé");
    }

    public function edit(Post $post){

        return view('blog.edit',[
            'post'=> $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()

        ]);
    }
    public function update(Post $post, FormPostRequest $request){
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "l'article a bien été modifiée");
    }

    public function index (): View {

        return view ('blog.index', [
            'posts' => post::with('tags', 'category')->paginate(10)
        ]);
        
    }
    public function show(string $slug, Post $post ): RedirectResponse | View
    {

        if($post->slug !== $slug ){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);

       
    }

}