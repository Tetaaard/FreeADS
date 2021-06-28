@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>


          <div class="inbox_chat">
            <ul class="users active_chat">
              @foreach ($users as $user)
                <li class="user" id="{{ $user->id}}">
                  <div class="chat_list">
                    <div class="chat_people">
                      <div class="chat_img"> 
                        @if($user->unread)
                        <span class="pending">{{ $user->unread }}</span>
                        @endif 
                        <img src="{{'/uploads/avatars/'.$user->avatar}}"  alt="sunil"> 
                      </div>
                      <div class="chat_ib">
                        <h5>{{ $user->name}}<span class="chat_date">{{ $user->created_at}}</span></h5>
                        <p>{{ $user->email}}</p>
                      </div>
                    </div>
                  </div>
                </li>   
              @endforeach
            </ul>
          </div>
        </div>

        <div class="mesgs" id="messages">

          
           
      </div>
      
      </div>
    </div>
  </div>
@endsection