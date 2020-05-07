<html>
    <head>
        <title>Plazo fijo</title>
    </head>
    <body>
        <form action="/plazoFijo/reinvertir" method="POST">
            @csrf
            <h1>Monto de su plazo fijo</h1>
            <label>Nombre:</label>
            <input name="nombre" type="text" value="{{ $nombre }}"></input>
            <br>
            <label>Apellido:</label>
            <input name="apellido" type="text" value="{{ $apellido }}"></input>
            <br>
            <label>Monto: $</label>
            <input name="monto" type="text" value="{{ $monto }}"></input>
            <br>
            <label>Dias:</label>
            <input name="dias" type="text" value="{{ $dias }}"></input>
            <br>
            <label>Monto final: $</label>
            <input name="montoFinal" type="text" value="{{ $montoFinal }}"></input>
            <br>
            <label>Reinvertir: </label>
            <br>
            <input type="submit" value="reinvertir">
        </form>
    </body>
</html>
