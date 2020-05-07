<!doctype html>
<html lang="es">
    <head>
        <title>Plazo fijo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <div class="card-header">
            <h1>Ingrese sus datos</h1>
        </div>
        <div class="container-fluid row-1 aling-item">
            <div class="col-sm-4">
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="/plazoFijo" method="POST">
                            @csrf
                            <h4>Datos personales:</h4>
                            <br>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}">
                            <br>
                            <label>Apellido:</label>
                            <input type="text" name="apellido" value="{{ old('apellido') }}">
                            <br>
                            <label>Monto a invertir:</label>
                            <input type="text" name="monto" value="{{ old('monto') }}">
                            <br>
                            <label>Cantidad de dias:</label>
                            <input type="number" name="dias" max="360" min="30" value="{{ old('dias') }}">
                            <br>
                            <input type="submit" value="Calcular" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
