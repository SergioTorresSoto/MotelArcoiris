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
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="{{ asset("assets/js/jquery-2.1.4.js") }}"></script>
    
    
    <link href="{{ asset('css/navStyle.css') }}" rel="stylesheet">

    
     @yield('style')
</head>



<body style="background-image:url('{{ asset('imagen/vintage-concrete.png') }}');" onload="alertaTras5seg('{{ Auth::user() }}')">
    <div id="app">
      <div id="mostrar-nav"></div>
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
               @guest
                <li class="active"><a href="{{ route('reservaonline.create') }}">Reserva</a></li>
            
                     <li><a href="{{route('habitaciones.index')}}">Habitaciones</a></li>
                @endguest

                @auth
                @if(Auth::user()->tipo3() || Auth::user()->tipo1())
                 <!-- cliente -->  
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cliente<span class="caret"></span></a>
                  <ul class="menu dropdown-menu" role="menu">
                  
                <li><a href="{{ route('productosclientes.create') }}">Comprar productos</a></li>
                
                  </ul>
                </li>
                @endif
                @endauth
          
                @auth
                @if(Auth::user()->tipo1())
                    <!-- admin -->   
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administracion<span class="caret"></span></a>
                  <ul class="menu dropdown-menu" role="menu">
                   
                    <li><a href="{{ route('tarifas.index') }}">Tarifa</a></li>

                    <li><a href="{{ route('usuarioshabitaciones.index') }}">Reservas</a></li>
                   
                                      
                    <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                  
                     <li class="divider"></li>
                   
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Habitaciones</a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('habitaciones.index') }}">Habitaciones</a></li>
                          <li><a tabindex="-1" href="{{ route('estadohabitacion.index') }}">Estado Habitaciones</a></li>

                          <li><a tabindex="-1" href="{{ route('habitacionesinsumos.index') }}">Limpieza</a></li>
                          
                          <li><a tabindex="-1" href="{{ route('tipohabitacion.index') }}">Tipo Habitacion</a></li>
                          
                        </ul>
                    </li>
                   
                    
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Insumos</a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('insumos.index') }}">Insumos</a></li>
                          <li><a tabindex="-1" href="{{ route('proveedoresinsumos.index') }}">Comprar</a></li>
                          <li><a tabindex="-1" href="{{ route('tipoinsumo.index') }}">Tipo</a></li>
                          
                        </ul>
                    </li>



                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Productos </a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('productos.index') }}">Productos</a></li>
                          <li><a tabindex="-1" href="{{ route('proveedoresproductos.index') }}">Compra</a></li>

                          <li><a tabindex="-1" href="{{ route('productosusuarios.index') }}">Nueva Venta</a></li>
                          
                          <li><a tabindex="-1" href="{{ route('tipoproducto.index') }}">Tipo</a></li>
                          
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Servicios Básicos </a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('pagoservicio.index') }}">Servicios</a></li>
                          <li><a tabindex="-1" href="{{ route('tiposervicio.index') }}">Tipo</a></li>
                          
                        </ul>
                    </li>
                    <li class="divider"></li>
                   
                    <li  class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="{{ route('users.index') }}">Usuarios</a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ route('users.index') }}">Usuarios</a></li>
                          <li><a tabindex="-1" href="{{ route('userstype.index') }}">Tipo</a></li>
                          <li><a tabindex="-1" href="{{ route('usersjornadas.index') }}">Horarios</a></li>
                          <li><a tabindex="-1" href="{{ route('jornadas.index') }}">Jornadas Laborales</a></li>
                        </ul>
                    </li>
 
                    <li><a href="{{ route('controlhorario.index') }}">Asistencia</a></li>
                     <li class="divider"></li>
                      <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="{{ route('users.index') }}">Graficos</a>
                        <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ url('grafico/ventaproductos') }}">Ventas</a></li>
                          <li><a tabindex="-1" href="{{ url('grafico/compraproductos') }}">Compras</a></li>
                          <li><a tabindex="-1" href="{{ url('grafico/reservas') }}">Reservas</a></li>
                         
                        </ul>
                    </li>
                  
                  </ul>

                </li>
              @endauth
              @endif

              @auth
              @if(Auth::user()->tipo2() || Auth::user()->tipo1())
              <!-- Recepcion -->
             <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recepcion<span class="caret"></span></a>
                  <ul class="menu dropdown-menu" role="menu">
                   
                    
                    <li><a href="{{ route('usuarioshabitaciones.index') }}">Reservas</a></li>
                   
                                      
                    
                     <li class="divider"></li>
                   
                        <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Habitaciones</a>
                        <ul class="dropdown-menu">
                          
                          <li><a tabindex="-1" href="{{ route('habitacionesinsumos.index') }}">Limpieza</a></li>
                          
                          
                        </ul>
                    </li>
                    
                    
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" >Productos</a>
                        <ul class="dropdown-menu">
                          
                          <li><a tabindex="-1" href="{{ route('productosusuarios.index') }}">Nueva Venta</a></li>
                          
                          
                        </ul>
                    </li>

                    <li><a href="{{ route('controlhorario.index') }}">Asistencia</a></li>
                  
                </ul>
           
          </li>
          @endauth
          @endif
        </ul>
              <ul class="nav navbar-nav navbar-right">
                @auth
                @if (!Auth::user()->tipo3())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Notifications <span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
                    </a>
                 
                    <ul class="menu dropdown-menu" role="menu">
                        <li>
                            @foreach (Auth::user()->unreadNotifications as $notification)
                                <a href="{{ route('productosusuarios.index', $notification->id) }}"><i>{{ $notification->data["mensaje"] }}</i></a>
                            @endforeach
                        </li>
                    </ul>
                </li>
                @endauth
                @endif
                <li><p class="navbar-text">¿Estas de visita?</p></li>

                @if (Auth::guest())
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">

                        <li>
                             <div class="row">
                                    <div class="col-md-12">
                                        Iniciar Sesion 
                                        <hr>
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
                                  @if(Auth::user()->id_type == 1 || Auth::user()->id_type == 2)
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                  @else
                                    Habitacion N°{{ Auth::user()->email }} <span class="caret"></span>
                                  @endif
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
    <footer>
        <div class = "footer-container">
            <div class = "footer-main">
                <div class = footer-columna>
                    <h3>Direccion y contacto</h3>
                    <span class ="fa fa-map-marker"><p>Parcela 6-B Lagunilla 2 Coronel</p></span>
                    <span class ="fa fa-phone"><p>fono:(+56) 996269194</p></span>
                    <span class = "fa fa-share"><p>motelArcoiris@gmail.com</p></span>
                           
                </div>

                <div class = footer-columna>
                    <h3>Redes Sociales</h3>
                    <div class = "footer-redes">
                        <a href="https://www.facebook.com/motelarcoiris/?ref=br_rs" class ="fa fa-facebook"></a>
                        <a href="#" class ="fa fa-twitter"></a>
                        <a href="#" class ="fa fa-github"></a>
                        
                    </div>
                </div>
                    <div class = footer-columna>
                    <h3>Mapa</h3>
                    <div class = "footer-redes">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3187.004545742546!2d-73.15334218507972!3d-36.98582469489248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669c7f984ed11ff%3A0x2f1d2cd5c0900016!2sMotel+Arcoiris!5e0!3m2!1ses-419!2scl!4v1536596886968" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
                    </div>
                </div>

        
        </div>
        <div class = "footer-copy-redes">
            <div class = "main-copy-redes">
                <div class = "footer-copy">
                    &copy; 2018 Todos los derechos reservados - | Tesis IECI |.

                </div>
            </div>
        </div>   
    </footer>
</body>
    


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('push.js-master/push.js') }}"></script>
    <script src="{{ asset('alertas/alert.js') }}"></script>
    
    @yield('script') 

<script type="text/javascript">

    
$('#mostrar-nav').on('click',function(){
  $('nav').toggleClass('mostrar');
})

        function alertaTras5seg(user) {
            
          if (user) {
            var datos= jQuery.parseJSON(user);
              if (datos.id_type == 1) {  
                comienzaReserva();
                finalizaReserva();
              }
          }else{
            funcionquenohacenada();
          }
        return 0;
        }
        function funcionquenohacenada(){
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          return 0;
        }
        function finalizaReserva(){
            
        //  console.log("buscafilaizareserva");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
               type:'POST',
               url:'/usuarioshabitaciones/consultareserva',
               data:{},
               success:function(resul){
                   var aux= jQuery.parseJSON(resul);
                  //  console.log(aux);
                  for (var i = aux.length - 1; i >= 0; i--) {
                        
                      
                        Push.create("Habitacion #"+aux[i].numero_habitacion+"",{
                            body:"Esta habitacion esta proxima al cumplimiento de su horario",
                            timeout: 40000,
                            onClick: function(){
                                window.location="http://localhost:8000/usuarioshabitaciones";
                                this.close();
                            }
                        });
                       
                    }  
                }
            });

            setTimeout(finalizaReserva, 60000*10);
        }

       function comienzaReserva() { 
    
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
                        console.log(data);
                    }else{
                      var aux= jQuery.parseJSON(data);
                      for (var i = aux.length - 1; i >= 0; i--) {
    
                          Push.create("Habitacion #"+aux[i].numero_habitacion+"",{
                              body:"Esta reserva esta proxima a su comienzo",
                              timeout: 40000,
                              onClick: function(){
                                  window.location="http://localhost:8000/usuarioshabitaciones";
                                  this.close();
                              }
                          }); 
                      }                     
                    }
                }
            });

            setTimeout(comienzaReserva, 60000); 
        }

    </script>
    


</body>
</html>
