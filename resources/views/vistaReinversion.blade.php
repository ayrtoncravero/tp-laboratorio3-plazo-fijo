<html>
    <head>
        <title>Resultado de reinversion</title>
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
                        <h4>Datos personales:</h4>
                        <br>
                        <p>Nombre y apellido: {{ $nombre }} {{ $apellido }}</p>
                        <p>Monto inicial: ${{ $monto }}</p>
                        <p>Dias: {{ $dias }}</p>
                        <p>Monto de reinversion: ${{ $reinversiones }}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
