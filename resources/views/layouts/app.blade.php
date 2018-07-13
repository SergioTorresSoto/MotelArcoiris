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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}"> <!-- CSS reset -->
    <script src="{{ asset("assets/js/modernizr.js") }}"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}"> <!-- Resource style -->
    
     @yield('style')
</head>
<body onload="alertaTras5seg()">
    <div id="app">
        <header class="cd-main-header">
        <a id="sub" href="#0" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>

        <nav class="cd-nav">
            <ul class="cd-top-nav">
                <li><a id="sub" href="#0">Tour</a></li>
                <li><a id="sub" href="#0">Support</a></li>
                @if (Auth::guest())
                            <li><a id="sub" href="{{ route('login') }}">Login</a></li>
                            <li><a id="sub" href="{{ route('users.create') }}">Register</a></li>
                @else
                            <li class="dropdown">
                                <a id="sub" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->email }} <span class="caret"></span>
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
                    <a id="sub" href="{{ url('usuarioshabitaciones') }}">Reservas</a>
                    
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
                    <a id="sub" href="{{ url('insumos') }}">Insumos</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('proveedoresinsumos') }}">Listar Compra</a></li>
                        <li><a id="sub" href="{{ url('proveedoresinsumos/create') }}">Comprar Isumos</a></li>
                         <li><a id="sub" href="{{ url('tipoinsumo/create') }}">Listar Tipo Isumos</a></li>
                    </ul>
                </li>
                <li class="has-children images">
                    <a id="sub" href="{{ url('productos') }}">Productos</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('proveedoresproductos') }}">Listar Compras</a></li>
                        <li><a id="sub" href="{{ url('proveedoresproductos/create') }}">Comprar Productos</a></li>
                        <li><a id="sub" href="{{ url('tipoproducto') }}">Listar Tipo Productos</a></li>
                    </ul>
                </li>
                <li class="has-children images">
                    <a id="sub" href="{{ url('controlhorario') }}">Asistencia</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('controlhorario/create') }}">Marcar Asistencia</a></li>
                    </ul>
                </li>

                <li class="has-children images">
                    <a id="sub" href="{{ url('habitaciones') }}">Habitaciones</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('tipohabitacion') }}">Listar Tipo Habitacion</a></li>
                        <li><a id="sub" href="{{ url('estadohabitacion') }}">Listar Estado Habitacion</a></li>
                    </ul>
                </li>

                <li class="has-children users">
                    <a id="sub" href="{{ url('users') }}">Usuarios</a>
                    
                    <ul>
                        <li><a id="sub" href="{{ url('userstype') }}">Tipos de Usuarios</a></li>
                        <li><a id="sub" href="{{ url('controlhorario') }}">Control de Asistencia</a></li>
                        <li><a id="sub" href="{{ url('usersjornadas') }}">Horario Empleados</a></li>

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
    <script type="text/javascript">

        function alertaTras5seg() {

            setTimeout(mostrarAlerta, 0);

        }

        function mostrarAlerta() { 
    

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

        var name = "nombre";

        var password = "nombre";

        var email = "email";


        $.ajax({

           type:'POST',

           url:'/usuarioshabitaciones/consulta',

           data:{name:name, password:password, email:email},

           success:function(data){
            if(!data){
              console.log(data.success);
            }else{
                alert(data.success);
                location.reload();
            }
           }
        });

            setTimeout(mostrarAlerta, 60000); 
        }

    </script>

</body>
</html>
