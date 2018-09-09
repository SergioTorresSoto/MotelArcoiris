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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="{{ asset("assets/js/jquery-2.1.4.js") }}"></script>
    
    
    <link href="{{ asset('css/navStyle.css') }}" rel="stylesheet">

    
     @yield('style')
</head>
<body onload="alertaTras5seg()">
    <div id="app">
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ route('reservaonline.index') }}">Motel Acoiris</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('reservaonline.create') }}">Reserva</a></li>
                <li><a href="#">Habitaciones</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administracion<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('usuarioshabitaciones.index') }}">Reservas</a></li>
                    <li><a href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('proveedoresproductos.index') }}">Compra Productos</a></li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Insumos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('insumos.index') }}">Insumos</a></li>
                          <li><a tabindex="-1" href="{{ route('proveedoresinsumos.index') }}">Compra</a></li>
                          <li><a tabindex="-1" href="{{ route('tipoinsumo.index') }}">Tipo</a></li>
                          
                        </ul>
                    </li>
                    <li class="divider"></li>
                   
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="{{ route('users.index') }}">Usuarios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('userstype.index') }}">Tipo</a></li>
                          <li><a tabindex="-1" href="{{ route('usersjornadas.index') }}">Horarios</a></li>
                          <li><a tabindex="-1" href="{{ route('jornadas.index') }}">Jornadas Laborales</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('controlhorario.index') }}">Asistencia</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">¿Estas de visita?</p></li>

                @if (Auth::guest())
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">

                        <li>
                             <div class="row">
                                    <div class="col-md-12">
                                        Login via
                                <div class="social-buttons">
                                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                </div>
                                or
                                        <form class="form" id="login-nav" method="POST" action="{{ route('login') }}">
                                              {{ csrf_field() }}
                                                
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="sr-only">E-Mail Address</label>

                                                    
                                                        <input id="email" class="form-control" name="email" value="{{ old('email') }}"placeholder="Email address" required autofocus>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                  
                                                </div>
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="sr-only">Password</label>
                                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                   
                                                </div>
                                                <div class="form-group">
                                                    
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Login
                                                        </button>

                                                        <a class="help-block text-right" href="{{ route('password.request') }}">
                                                            Forgot Your Password?
                                                        </a>
                                                  
                                                </div>
 
                                                <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                         </label>
                                                </div>
                                                   
                                                
                                               
                                         </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#"><b>Join Us</b></a>
                                    </div>
                             </div>
                        </li>
                    </ul>
                </li>
            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
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
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </div>
        @yield('content')    
    
</body>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('alertas/alert.js') }}"></script>
    
    

     @yield('script')   

    <script type="text/javascript">

        $(document).ready(function(){
          $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
          });
        });

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
