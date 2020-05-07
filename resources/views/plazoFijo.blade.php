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
            <h1>Ingrese sus datos</h1>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="{{ old('nombre') }}">
            <br><br>
            <label>Apellido: </label>
            <input type="text" name="apellido" value="{{ old('apellido') }}">
            <br><br>
            <label>Monto a invertir: $</label>
            <input type="text" name="monto" value="{{ old('monto') }}">
            <br><br>
            <label>Cantidad de dias: </label>
            <input type="number" name="dias" max="360" min="30" value="{{ old('dias') }}">
            <br><br>
            <input type="submit" value="Calcular">
        </form>
    </body>
</html>
