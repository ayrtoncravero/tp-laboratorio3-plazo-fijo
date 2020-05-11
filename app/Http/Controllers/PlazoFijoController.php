<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidDataException;
use App\Servicios\PlazoFijo;
use App\Servicios\PlazoFijoService;
use Illuminate\Http\Request;

class PlazoFijoController extends Controller
{
    private PlazoFijoService $plazoFijoService;

    public function __construct(PlazoFijoService $plazoFijoService)
    {
        $this->plazoFijoService = $plazoFijoService;
    }

    public function calcular(Request $request){

        try {
            $data = $this->plazoFijoService->validator($request);
            $data ['montoFinal']= $this->plazoFijoService->calcular($data['monto'], $data['dias']);
            return view('calculoFinal', $data);
        }
        catch (InvalidDataException $error){
            return redirect()->back()->withErrors($error ->getMessages());
        }
    }

    public function reinvertir(Request $request)
    {
        $data = $this->plazoFijoService->validator($request);

        $dias = $data['dias'];

        $reinversiones = [$this->plazoFijoService->calcular($data['monto'], $data['dias'])];

        for ($i = 1; $i < 4; $i++) {
            $reinversiones[] = $this->plazoFijoService->calcular($dias, $reinversiones[$i - 1]);
        }

        $data['reinversiones'] = implode($reinversiones);

        return view('vistaReinversion', $data);
    }
}
