<html>
    <head>
        <title>Plazo fijo</title>
    </head>
    <body>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <form action="/plazoFijo" method="POST">
            @csrf
            <label>Nombre: </label>
            <input type="text" name="nombre">
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
