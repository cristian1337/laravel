<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::latest()->get();
        $rol = auth()->user()->rol;
        $idU = auth()->user()->id;
        $services = Service::where('estado', 'disponible')->get();
        $misServicios = Service::where('user_id', $idU)->get();
        $serviciosDriver = Service::where('driver_id', $idU)->get();
        //dd($rol);

        if ($rol == 'cliente')
        {
            return view('home', [
                'users' => $users,
                'misServicios' => $misServicios
            ]);
        }elseif ($rol == 'conductor')
        {
            return view('conductor', [
                'services' => $services,
                'serviciosDriver' => $serviciosDriver
            ]);
        }

    }
}
