<html>
    <head>
        <title>Plazo fijo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <div class="card-header">
            <h1>Monto de su plazo fijo</h1>
        </div>
        <div class="container-fluid row-1 aling-item">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <form action="/plazoFijo/reinvertir" method="POST">
                            @csrf
                            <h4>Datos personales:</h4>
                            <br>
                            <label>Nombre:</label>
                            <input name="nombre" type="text" readonly value="{{ $nombre }}"></input>
                            <br>
                            <label>Apellido:</label>
                            <input name="apellido" type="text" readonly value="{{ $apellido }}"></input>
                            <br>
                            <label>Monto:</label>
                            <input name="monto" type="text" readonly value="{{ $monto }}"></input>
                            <br>
                            <label>Dias:</label>
                            <input name="dias" type="text" readonly value="{{ $dias }}"></input>
                            <br>
                            <label>Monto final:</label>
                            <input name="montoFinal" type="text" readonly value="{{ $montoFinal }}"></input>
                            <br>
                            <input type="submit" value="reinvertir" class="btn btn-primary">
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
