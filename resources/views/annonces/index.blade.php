@extends('layouts.app')
@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Announce Page
        </h1>
        <br>
        <div class="w-full inline-flex">
        <div class="w-2/5 m-autor">
        <form id="categories">
            <label class="block mt-4">
                <span class="text-gray-700">Select categorie</span>
                <select name="categorie" class="form-select mt-1 block w-full">
                  <option>Select categorie</option>
                    @foreach ($posts as $categorie)
                  <option value="{{$categorie->id}}" id="{{$categorie->id}}">{{$categorie->slug}}</option>
                  @endforeach
                </select>
              </label>
        </form>
        </div>
        <div class="w-2/5  ">
            <form id="categories">
                <label class="block mt-4">
                    <span class="text-gray-700">Sort by</span>
                    <select name="categorie" class="form-select mt-1 block w-full">
                     <option >Select on option of search</option>
                      <option value="1">+ most popular at least -</option>
                      <option value="2">+ newest to oldest - </option>
                      <option value="3">+ less expensive to more expensive -</option>
                    </select>
                  </label>
            </form>
            </div>
        </div>
        <br>
        <br>
    
        <form action="{{ route('posts.search')}}" method="POST" id="search-form">
        <div class="bg-white shadow p-4 flex">
            <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                <i class="material-icons text-3xl">search</i>
            </span>
            <input class="w-full rounded p-2" type="text" placeholder="Try 'Video Game'" name="query" id="query">
            <button type="submit" class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4">
                    <p class="font-semibold text-xs">Search</p>
            </button>
        </div>
    </form>
   
    </div>
</div>
<div id="posts" class="inline-flex px-6 pl-40">
</div>
@if (session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
<p class="w-2/65 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
{{session()->get('message')}}</p>
</div>   
@endif
@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a href="/annonces/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create Annonce
        </a>
    </div> 
@endif
@foreach ($posts as $post)
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img class="m-auto" src="{{ asset('images/'.$post->image_path)}}" width="400">
        {{-- <img src="public/images/{{$post->image_path}}" alt =""> --}}
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{$post->title}}
        </h2>

        <span class="text-gray-500">
            <strong>{{$post->slug}} - </strong> 
            Sold by <span class="font-bold-italic text-gray-800"> {{ $post->user->name}}

             </span>,posted on {{ $post->created_at->format('d M Y')}} {{--{{ date('jS M Y', strtotime($post->updated_at))}} --}}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{$post->description}}
        </p>
        <a href="/annonces/{{ $post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            buy for {{$post->price}}
        </a>
        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
        <span class="float-right">
            <a href="/annonces/{{ $post->slug }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                Edit
            </a>
        </span> 
        <span class="float-right">
            <form action="/annonces/{{$post->slug}}" method="POST">
                @csrf
                @method('delete')

                <button class="text-red-500 pr-3" type="submit">
                    Delete
                </button>

            </form>
        </span> 
       @endif 
    </div>
</div>
@endforeach
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="https://images.pexels.com/photos/4246117/pexels-photo-4246117.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt ="" width="400">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            You too,
        </h2>

        <span class="text-gray-500">
            With <span class="font-bold-italic text-gray-800"> FreeAds

            </span>,send your packages safely
        </span>
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        </p>
        <a href="" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Keep Reading
        </a>
    </div>
</div>
@endsection