<html>
    <head>
        <title>Plazo fijo</title>
    </head>
    <body>
        <form action="/plazoFijo/reinvertir" method="POST">
            @csrf
            <h1>Monto de su plazo fijo</h1>
            <input type="text" readonly value="{{ $nombre }} {{ $apellido }}">Nombre: {{ $nombre }} | Apellido: {{ $apellido }}</input>
            <input type="text" readonly value="{{ $monto }}">Monto inicial: ${{ $monto }}</input>
            <input type="text" readonly value="{{ $dias }}">Cantidad de dias: {{ $dias }}</input>
            <input type="text" readonly value="{{ $montoFinal }}">Monto final: ${{ $montoFinal }}</input>
            <label>Reinvertir: </label>
            <input type="submit" value="reinvertir">
        </form>
    </body>
</html>
