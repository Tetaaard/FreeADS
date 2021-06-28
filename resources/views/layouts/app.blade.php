<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
    
   <!-- Styles -->
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Link< -->

<link href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,600;0,700;1,400&amp;display=swap'><link rel="stylesheet" href="./style.css">
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-800 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/annonces">Annonces</a>
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ url('/messages') }}" class="no-underline hover:underline mt-3">Messages </a>
                        <a href="{{ url('/profile') }}" class="no-underline hover:underline mt-3">Profil</a>
                        <span>{{ Auth::user()->name }}</span>

            

                        
                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
        
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function (){
                // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('bef9b21e91eca3554154', {
            cluster: 'eu'
            });
            
            var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

            $('.user').click(function (){
                $('.user').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pending').remove();

                receiver_id = $(this).attr('id');
                // alert(receiver_id);
                $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                //    alert(data);
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
                });
            });
      

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty


                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });
        
    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.msg_history').animate({
            scrollTop: $('.msg_history').get(0).scrollHeight
        }, 50);
    }


    </script>
</body>
</html>
