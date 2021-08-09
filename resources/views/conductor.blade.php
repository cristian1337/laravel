@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="row p-4">
                    <h2 class="col-sm-12">Servicios Disponiles</h2>                    
                    @foreach($services as $service)
                    <div class="col-sm-6 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de origen: </span>{{ $service->ubicacion_origen }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de destino: </span>{{ $service->ubicacion_destino }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Oferta: </span>{{ $service->oferta }}</h6>
                                <form action="{{ route('services.update', $service) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-primary" value="Aceptar">
                                </form>
                            </div>
                            <div class="card-footer text-muted">
                                <p>Usuario: {{ $service->user->name }}</p>
                            </div>    
                        </div>
                    </div>
                    @endforeach
                        
                </div>

                <div class="row p-4">
                    <h2 class="col-sm-12">Servicio aceptado y en curso</h2>
                    @foreach($serviciosDriver as $service)
                    <div class="col-sm-6 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de origen: </span>{{ $service->ubicacion_origen }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Ubicación de destino: </span>{{ $service->ubicacion_destino }}</h6>
                                <h6 class="card-subtitle mb-2"><span class="text-primary">Oferta: </span>{{ $service->oferta }}</h6>
                            </div>
                            <div class="card-footer text-muted">
                                <p>Usuario: {{ $service->user->name }}</p>
                            </div>    
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="container pt-3">
            
        </div>
    </div>
</div>
@endsection
