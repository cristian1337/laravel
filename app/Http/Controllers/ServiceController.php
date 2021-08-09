<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function store(Request $request){

        $service = Service::create([
            'user_id' => auth()->user()->id,
            'ubicacion_origen' => $request->origen,
            'ubicacion_destino' => $request->destino,
            'oferta' => $request->oferta,
            'estado' => "disponible"
        ]);

        $request->validate([
            'ubicacion_origen' => 'required',
            'ubicacion_destino' => 'required',
            'oferta' => 'required',
        ]);

        return back()->with('status', 'Solicitud creada con éxito');
    }

    public function update(Request $request, Service $service){
        $name_driver = auth()->user()->name;
        $idDriver = auth()->user()->id;

        $service->update([
            'driver_id' => $idDriver,
            'driver_name' => $name_driver,
            'estado' => 'ocupado'
        ]);

        return back()->with('status', 'Solicitud tomada con éxito');
    }
}
