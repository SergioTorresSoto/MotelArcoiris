<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="reservaOnlinePdf/style.css" media="all" />
  </head>
  <body>

    <header class="clearfix">
      <div id="logo">
        <img src="reservaOnlinePdf/logo.png">
      </div>
      <h1>Detalle Reserva</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROPOSITO</span> Reserva</div>
        <div><span>DIRECCION</span> Parcela 6B Lagunilla 2, Coronel</div>
        <div><span>EMAIL</span> <a href="mailto:motelArcoiris@gmail.com"> motelArcoiris@gmail.com</a></div>
        <div><span>FECHA</span>{{$reserva->created_at}}</div>
        <div><span>ID</span> {{$reserva->id}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICIO</th>
            <th class="desc">HABITACION</th>
            <th class="desc">HORA ENTRADA</th>
            <th class="desc">HORA SALIDA</th>

            <th>TARIFA</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">{{$reserva->tiempo_reserva}} Horas</td>
            <td class="desc"># {{$habitacion->numero_habitacion}}</td>
            <td class="desc">{{$reserva->tiempo_inicio}}</td>
            <td class="desc">{{$reserva->tiempo_fin}}</td>
            <td class="qty">${{$reserva->tarifa}}</td>
          </tr>
         
        </tbody>
      </table>
      <div id="notices">
        <div>Observacion</div>
        <div class="notice">Presenta este comprobante para hacer valida la reserva</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>