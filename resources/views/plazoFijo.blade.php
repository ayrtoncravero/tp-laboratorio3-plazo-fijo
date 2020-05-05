<html>
    <head>
        <title>Plazo fijo</title>
    </head>
    <body>
        <form action="/plazoFijo" method="POST">
            @csrf
            <label>Nombre: </label>
            <input type="text" name="nombre">
            @if($errors->has('nombre'))
                {{ $errors->first('nombre') }}
            @endif
            <br>
            <label>Apellido: </label>
            <input type="text" name="apellido">
            <br>
            <label>Monto a invertir: $</label>
            <input type="text" name="monto">
            <br>
            <label>Cantidad de dias: </label>
            <input type="number" name="dias" max="360" min="30">
            <br>
            <input type="submit" value="Calcular">
        </form>
    </body>
</html>
