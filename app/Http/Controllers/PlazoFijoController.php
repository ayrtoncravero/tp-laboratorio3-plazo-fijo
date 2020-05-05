<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlazoFijoController extends Controller
{
    public function calcular(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $monto = $request->input('monto');
        $dias = $request->input('dias');

        //Validacion de usuario. Esto va a ser cambiado a SERVICE

        if (empty($nombre) && is_numeric($nombre))
        {
            //return view('vistaDeError', ['mensaje' => 'Nombre y apellido no puedes ser vacios']);
            redirect()->back()->withErrors(['nombre' => '*Nombre no puede ser vacio, ni ser numeros']);
        }
        if (empty($apellido) && is_numeric($apellido))
        {
            redirect()->back()->withErrors(['apellido' => '*El apellido no puede ser vacio, ni ser numeros']);
        }

        if (!is_numeric($monto) && !$monto >= 1000 && empty($monto))
        {
            //return view('vistaDeError', ['mensaje' => 'El monto debe de ser un numero, y el minimo de $1000']);
            redirect()->back()->withErrors(['monto' => '*El monto debe de ser un numero, y el minimo de $1000 y no puede ser vacio']);
        }

        if (!is_numeric($dias) && $dias <= 30 && empty($dias))
        {
            //return view('vistaDeError', ['mensaje' => 'Se debe de ingresar un numero valido, y el minimo de dias es 30']);
            redirect()->back()->withErrors(['dias' => '*Se debe de ingresar un numero valido, y el minimo de dias es 30 y tampoco ser vacio']);
        }

        $montoFinal = $this->montoFinal($monto, $dias);
        return view('calculoFinal', ['nombre' => $nombre, 'apellido' => $apellido, 'dias' => $dias, 'monto' => $monto, 'montoFinal' => $montoFinal]);
    }

    private function getPorcentaje($dias){
        //Calcular el porcentaje. podria poner un swich

        if ($dias >= 30 && $dias <= 60)
        {
            $porcentaje = 40;
        }
        elseif ($dias >= 61 && $dias <= 120)
        {
            $porcentaje = 45;
        }
        elseif ($dias >= 121 && $dias <=360)
        {
            $porcentaje = 50;
        }
        elseif ($dias === 360)
        {
            $porcentaje = 65;
        }
        return $porcentaje;
    }

    private function montoFinal($monto, $dias){
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

        if (empty($monto) && !is_numeric($monto) && $monto >= 1000)
        {
            redirect()->back()->withErrors(['monto' => '*El monto no puede ser vacio, no puede ser letras y tamcopo ser menor a $1000']);
        }
        if (empty($dias) && !is_numeric($dias) && $dias >= 30)
        {
            redirect()->back()->withErrors(['dias' => '*Se debe de ingresar un numero valido, y el minimo de dias es 30 y tampoco ser vacio']);
        }

        $reinversiones = [$this->montoFinal($monto, $dias)];

        for ($i = 1; $i < 4; $i++){
            $reinversion[] = $this->montoFinal($dias, $reinversiones[$i-1]);
        }
        return view('nombre vista', ['nombre' => $nombre, ]);
    }
}
