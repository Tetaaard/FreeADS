@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15 {{-- border-b border-gray-200 --}}">
        <h1 class="text-6xl text-center">
            Create Annonce
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

<div class="w-4/5 m-auto pt-20 shadow-lg bg-white p-6 rounded">
    <form action="/annonces" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title..." value="{{ old('title') }}"  class="bg-transparent {{--bg-gray-0--}} block border-b-2 w-full h-20 text-6xl outline-none" >

        <textarea placeholder="Description..." name="description" class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none" {{--cols="30" rows="10" --}} >{{ old('description') }}</textarea>

        <input type="text" name="price" placeholder="Price...€ " value="{{ old('price') }}"  class="bg-transparent {{--bg-gray-0--}} block border-b-2 w-full h-20 text-3xl outline-none" >
        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white hover:bg-gray-100 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer" for="form-file">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input 
                type="file" 
                name="image" 
                class="hidden"
                id="form-file">
            </label>
        </div>
        <button type="submit" class="uppercase mt-15 bg-blue-500 hover:bg-blue-400  text-gray-100 text-lg front-extrabld py-4 px-8 rounded-3xl">
            Create
        </button>
    </form>

</div>


@endsection