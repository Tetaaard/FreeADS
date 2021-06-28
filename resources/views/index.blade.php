@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:s-auto block text-center px-4 w-full">
                <div class="w-4/5 pl-96 ">
                    <div class="bg-white flex items-center rounded-full shadow-xl">
                      <input class="rounded-l-full w-full py-4 px-6 text-gray-700 text-2xl leading-tight focus:outline-none" id="search" type="text" placeholder="Search">
                      
                      <div class="p-4">
                        <button class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-12 h-12 flex items-center justify-center">
                            <i class="material-icons text-3xl">search</i>
                        </button>
                        </div>
                      </div>
                    </div>

                    <p>select</p>
                    
                  </div>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://images.pexels.com/photos/5632397/pexels-photo-5632397.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
            width="700">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
            Welcome to FreeAds
            </h2>
            <p class="py-8 text-gray-500 text-l">
            With FreeAds, find the right deal on the referent site for person-to-person and professional classifieds.
            </p>
            <p class="font-extrabold text-gray-600 text-s pb-9">
            Easily post a free ad to sell, search, give away your second-hand or promote your services. 
            Buy securely with our online payment and delivery system for qualifying listings.  
            </p>
            <a href="/annonces" class="uppercase bg-green-300 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">Find Out More</a>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
        With millions of classified ads, find the right opportunity in our categories...
        </h2>
        <span class="font-extrabold block text-4xl py-1">
        car, real estate, 
        </span>
        <span class="font-extrabold block text-4xl py-1">
        employment, vacation, 
        </span>
        <span class="font-extrabold block text-4xl py-1">
            fashion, home,
        </span>
        <span class="font-extrabold block text-4xl py-1">
            video games, etc ... 
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Annonces
        </span>
        <h2 class="text-4xl font-bold py-10">
        Recents Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-purple-400 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
            <span class="uppercase text-xs">
            Bestsellers,
            </span>
            <h3 class="text-xl font-bold py-10">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </h3>

            <a href="/annonces" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">Find Out More</a>
            </div>
        </div>

        <div>
            <img src="https://images.pexels.com/photos/5632397/pexels-photo-5632397.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
            width="700">
        </div>
    </div>

@endsection