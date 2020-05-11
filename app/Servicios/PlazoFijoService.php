<?php

namespace App\Servicios;

use App\Exceptions\InvalidDataException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlazoFijoService
{

    private array $reglas = [
        'nombre' => 'bail|required|alpha',
        'apellido' => 'bail|required|alpha',
        'monto' => 'bail|required|numeric',
        'dias' => 'bail|required|integer',
    ];

    private array $mensajes = [
        'nombre.required'=>'*Nombre requerido',
        'apellido.required'=>'*Apellido requerido',
        'monto.required'=>'*Monto requerido',
        'dias.required'=>'*Dias requerido',
    ];

    public function validator(Request $request)
    {
        $validacionDatos = Validator::make($request->all(), $this->reglas, $this->mensajes);

        if ($validacionDatos-> fails()){
            throw new InvalidDataException($validacionDatos->errors()->getMessages());
        }

        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $monto = $request->input('monto');
        $dias = $request->input('dias');

        return ['nombre' => $nombre, 'apellido' => $apellido, 'monto' => $monto, 'dias' => $dias];
    }

    public function calcular($monto, $dias){
        return $this->montoFinal($monto, $dias);
    }

    private function getPorcentaje($dias)
    {
        //Calcular el porcentaje. podria poner un swich

        if ($dias >= 30 && $dias <= 60) {
            return 40;
        } elseif ($dias >= 61 && $dias <= 120) {
            return 45;
        } elseif ($dias >= 121 && $dias <= 360) {
            return 50;
        } elseif ($dias === 360) {
            return 65;
        }
    }

    private function montoFinal($monto, $dias)
    {
        if (!$monto) {
            throw new \Exception('El monto es cero');
        }
        $porcentaje = $this->getPorcentaje($dias);

        $montoFinal = $monto + $monto * ($dias / 360) * ($porcentaje / 100);
        return round($montoFinal,2);
    }
}
