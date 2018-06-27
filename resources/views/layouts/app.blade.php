<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    
    <script src="{{ asset("assets/js/modernizr.js") }}"></script> <!-- Modernizr -->
    
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}"> <!-- Resource style -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     @yield('style')
</head>
<body>
    <div id="app">
        <header class="cd-main-header">
        <a id="sub" href="#0" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>
        
        <div class="cd-search is-hidden">
            <form action="#0">
                <input  type="search" placeholder="Search...">
            </form>
        </div> <!-- cd-search -->

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">
                <li><a id="sub" href="#0">Tour</a></li>
                <li><a id="sub" href="#0">Support</a></li>
                @if (Auth::guest())
                            <li><a id="sub" href="{{ route('login') }}">Login</a></li>
                            <li><a id="sub" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a id="sub" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a id="sub" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                @endif
            </ul>
        </nav>
    </header> <!-- .cd-main-header -->

    <main class="cd-main-content">
        <nav class="cd-side-nav">
            <ul>
                <li class="cd-label">Main</li>
                <li class="has-children overview">
                    <a id="sub" href="#0">Overview</a>
                    
                    <ul>
                        <li><a id="sub" href="#0">All Data</a></li>
                        <li><a id="sub"href="#0">Category 1</a></li>
                        <li><a id="sub"href="#0">Category 2</a></li>
                    </ul>
                </li>
                <li class="has-children notifications active">
                    <a id="sub" href="#0">Notifications<span class="count">3</span></a>
                    
                    <ul>
                        <li><a id="sub" href="#0">All Notifications</a></li>
                        <li><a id="sub" href="#0">Friends</a></li>
                        <li><a id="sub" href="#0">Other</a></li>
                    </ul>
                </li>

                <li class="has-children comments">
                    <a id="sub" href="#0">Comments</a>
                    
                    <ul>
                        <li><a id="sub" href="#0">All Comments</a></li>
                        <li><a id="sub" href="#0">Edit Comment</a></li>
                        <li><a id="sub" href="#0">Delete Comment</a></li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li class="cd-label">Secondary</li>
                <li class="has-children bookmarks">
                    <a id="sub" href="#0">Bookmarks</a>
                    
                    <ul>
                        <li><a id="sub" href="#0">All Bookmarks</a></li>
                        <li><a id="sub" href="#0">Edit Bookmark</a></li>
                        <li><a id="sub" href="#0">Import Bookmark</a></li>
                    </ul>
                </li>
                <li class="has-children images">
                    <a id="sub" href="{{ url('controlhorario') }}">Asistencia</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('controlhorario/create') }}">Marcar Asistencia</a></li>
                    </ul>
                </li>

                <li class="has-children users">
                    <a id="sub" href="#0">Users</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('users') }}">All Users</a></li>
                        <li><a id="sub" href="#0">Edit User</a></li>
                        <li><a id="sub" href="#0">Add User</a></li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li class="cd-label">Action</li>
                <li class="action-btn"><a id="sub" href="#0">+ Button</a></li>
            </ul>
        </nav>

        <div class="content-wrapper">
            @yield('content')
        </div> <!-- .content-wrapper -->
    </main> <!-- .cd-main-content -->

        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 -->
    
    <script src="{{ asset("assets/js/jquery-2.1.4.js") }}"></script>
   
    <script src="{{ asset("assets/js/jquery.menu-aim.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script> <!-- Resource jQuery -->
     @yield('script')   
</body>
</html>
