<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function index()
    {
        $post = Post::all();

        return view('Post.index', ['post' => $post]);
    }

    public function filter(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
        ]);
        
        $inicio = $request->fecha_inicio;
        $final = $request->fecha_final;
        $post = Post::whereDate('created_at','>=',$inicio)
                    ->whereDate('created_at','<=',$final)->get();
        
        return view('Post.index', compact('post'));

    }

    public function create()
    {
        return view('Post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $descripcion =  $request->descripcion;

        // return $request;
        $dom = new DOMDocument();

        $dom->loadHTML($descripcion,9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'.jpg';
            file_put_contents(public_path().$image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }

        $descripcion = $dom->saveHTML();

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $descripcion,
            'url' => $request->url,
        ]);

        return Redirect::route('post.index');
    }


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('Post.edit', ['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $descripcion = $request->descripcion;

        $dom = new DOMDocument();
        $dom->loadHTML($descripcion,9);

        $images = $dom->getElementsByTagName('img');

        
        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {
              
                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time(). $key.'.jpg';
                file_put_contents(public_path().$image_name,$data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }

        }
        $descripcion = $dom->saveHTML();

        $post->update([
            'titulo' => $request->titulo,
            'descripcion' => $descripcion,
            'url' => $request->url,
        ]);

        return Redirect::route('post.index');
    }


    public function destroy(Post $post)
    {

        $dom= new DOMDocument();
        $dom->loadHTML($post->descripcion,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
               
            }
        }

        $post->delete();

        return back();
    }

    public function publish(Post $post)
    {
        $post->update([
            'postear' => $post->postear == false ? $post->postear = true : $post->postear = false
        ]);
        //     if($post->postear == false)
        //    $post->postear = true;
        //    else
        //    $post->postear = false;
        //    $post->save();
        return back();
    }
}
