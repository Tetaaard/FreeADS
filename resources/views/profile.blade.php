@extends('layouts.app')
@section('content')
<div class="p-8">
    <div class="shadow-xl rounded-lg">
      <div style="background-image: url('uploads/avatars/banner.svg')" class="h-64 bg-gray-200 bg-cover bg-center rounded-t-lg flex items-center justify-center"> 
        <p class="text-white font-bold text-4xl"></p>
      </div>
      <div class="bg-white rounded-b-lg px-8">
        <div class="relative">
              <img class="left-0 w-44 h-54 rounded-full mr-4 shadow-lg absolute -mt-36" src="{{'/uploads/avatars/'.$user->avatar}}" alt="Avatar of Jonathan Reinink">
        </div>
        <div class="pt-8 pb-8">
          <h1 class="text-2xl font-bold text-gray-700">{{ $user->name }}'s Profile</h1>
          <p class="text-sm text-gray-600">inscrit depuis le {{ $user->created_at->format('d M Y') }}</p>
          
          <p class="mt-6 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a sem varius, fringilla sapien at, sollicitudin risus.</p>
          
          <div class="flex  mt-8">
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="pull-right btn btn-sm ">Submit</button>
            </form>
          </div>

        </div>

        
          <div class="px-4 pt-4">
            <form action="#" class="flex flex-col space-y-8">
      
              <div class="form-item">
                <label class="text-xl ">Full Name</label>
                <input type="text" value="{{ $user->name }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
              </div>
      
              <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
      
                <div class="form-item w-full">
                  <label class="text-xl ">Username</label>
                  <input type="text" value="{{ $user->name }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
      
                <div class="form-item w-full">
                  <label class="text-xl ">Email</label>
                  <input type="text" value="{{ $user->email}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
              </div>
      
              <div>
                <h3 class="text-2xl font-semibold ">More About Me</h3>
                <hr>
              </div>
      
              <div class="form-item w-full">
                <label class="text-xl ">Biography</label>
                <textarea cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
              </div>
              <br>
              <br>
              
            </form>
          </div>
       

      </div>
    </div>
  </div>
@endsection