<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class PlazoFijoController extends Controller
{
    public function calcular(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $monto = $request->input('monto');
        $dias = $request->input('dias');

        $validacionDatos = $request->validate([
            'nombre' => 'bail|required|alpha',
            'apellido' => 'bail|required|alpha',
            'monto' => 'bail|required|numeric',
            'dias' => 'bail|required|integer',
            ]);

        //Validacion de usuario. Esto va a ser cambiado a SERVICE

        $montoFinal = $this->montoFinal($monto, $dias);
        return view('calculoFinal', ['nombre' => $nombre, 'apellido' => $apellido, 'dias' => $dias, 'monto' => $monto, 'montoFinal' => $montoFinal]);
    }

    private function getPorcentaje($dias){
        //Calcular el porcentaje. podria poner un swich

        if ($dias >= 30 && $dias <= 60)
        {
            return 40;
        }
        elseif ($dias >= 61 && $dias <= 120)
        {
            return 45;
        }
        elseif ($dias >= 121 && $dias <=360)
        {
            return 50;
        }
        elseif ($dias === 360)
        {
            return 65;
        }
    }

    private function montoFinal($monto, $dias){
        if (!$monto){
            throw new \Exception('El monto es cero');
        }
        $porcentaje = $this->getPorcentaje($dias);
        $montoFinal = $monto + $monto * ($dias/360) * ($porcentaje/100);
        return $montoFinal;
    }

    public function reinvertir(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $monto = $request->input('monto');
        $dias = $request->input('dias');

        if (empty($monto) && !is_numeric($monto) && !$monto >= 1000)
        {
            redirect()->back()->withErrors(['monto' => '*El monto no puede ser vacio, no puede ser letras y tamcopo ser menor a $1000']);
        }
        if (empty($dias) && !is_numeric($dias) && $dias >= 30)
        {
            redirect()->back()->withErrors(['dias' => '*Se debe de ingresar un numero valido, y el minimo de dias es 30 y tampoco ser vacio']);
        }

        $reinversiones = [$this->montoFinal($monto, $dias)];

        for ($i = 1; $i < 4; $i++){
            $reinversiones[] = $this->montoFinal($dias, $reinversiones[$i-1]);
        }
        return view('vistaReinversion', ['nombre' => $nombre, 'apellido' => $apellido, 'monto' => $monto, 'dias' => $dias, 'reinversiones' => implode($reinversiones)]);
    }
}
