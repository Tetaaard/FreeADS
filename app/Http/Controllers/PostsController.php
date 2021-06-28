<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::all();
   
        return view('annonces.index')
            ->with('posts', Post::orderBy('updated_at','DESC')->get());

    }

    public function search(Request $request) :JsonResponse
    {
        $query = $request->input('query');

        $posts = Post::where('title','like','%'.$query.'%')->get();

        foreach($posts as $post){

            $post [
                "image_path"
            ] = asset('images/'.$post['image_path']);
        }

        return response()->json([
            'posts'=> $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,gif|max:5048',
            'price'=>'required'
        ]);

        $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
            'price' => $request->input('price'),
            'image_path'=>$newImageName,
            'user_id'=> auth()->user()->id

            ]);

            return redirect('/annonces')->with('message','Your annonce has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('annonces.show')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('annonces.edit')
        ->with('post',Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        Post::where('slug', $slug)
        ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug'=> SlugService::createSlug(Post::class, 'slug', $request->title),
            'price' => $request->input('price'),
            'user_id'=> auth()->user()->id
        ]);

        return redirect('/annonces')
        ->with('message','Your annonce has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $post = Post::where('slug', $slug);
       $post->delete();

       return redirect('/annonces')
       ->with('message','Your annonce has been deleted!');
    }
}
