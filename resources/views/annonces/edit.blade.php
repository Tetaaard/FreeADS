@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15 {{-- border-b border-gray-200 --}}">
        <h1 class="text-6xl">
            Edit Annonce
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/4 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{$error}}
                </li>
            @endforeach

        </ul>
    </div>
    
@endif

<div class="w-4/5 m-auto pt-20">
    <form action="/annonces/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}"  class="bg-transparent {{--bg-gray-0--}} block border-b-2 w-full h-20 text-6xl outline-none" >

        <textarea placeholder="Description..." name="description" class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none" {{--cols="30" rows="10" --}} >{{ $post->description }}</textarea>

        <input type="text" name="price" placeholder="Price...€ " value="{{ $post->price }}"  class="bg-transparent {{--bg-gray-0--}} block border-b-2 w-full h-20 text-3xl outline-none" >
      
        <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg front-extrabld py-4 px-8 rounded-3xl">
            Create
        </button>
    </form>

</div>


@endsection